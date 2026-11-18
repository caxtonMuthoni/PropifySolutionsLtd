const text = (value) => ({
    content: [{ type: "text", text: typeof value === "string" ? value : JSON.stringify(value, null, 2) }],
});

const siteData = () => {
    try {
        return JSON.parse(document.getElementById("site-data")?.textContent ?? "{}");
    } catch (error) {
        return {};
    }
};

/**
 * Registers WebMCP tools so in-browser AI agents can use the site through
 * structured actions instead of guessing at the UI. Safe no-op in browsers
 * without `navigator.modelContext`.
 */
export function registerAgentTools() {
    if (typeof navigator === "undefined" || !navigator.modelContext) {
        return;
    }

    const tools = [
        {
            name: "list_services",
            description: "List the software development services Propify Solutions offers, with a short summary and page URL for each.",
            inputSchema: { type: "object", properties: {} },
            execute: async () => text(siteData().services ?? []),
        },
        {
            name: "open_page",
            description: "Navigate to a page on this site, e.g. /services, /portfolio, /locations/lagos-nigeria or /contact.",
            inputSchema: {
                type: "object",
                properties: { path: { type: "string", description: "A same-site path beginning with /." } },
                required: ["path"],
            },
            execute: async ({ path }) => {
                if (typeof path !== "string" || !path.startsWith("/") || path.startsWith("//")) {
                    return text("Path must be a same-site path that begins with /.");
                }

                window.location.assign(path);

                return text(`Navigating to ${path}.`);
            },
        },
        {
            name: "prefill_contact_form",
            description:
                "Open the contact page with the project enquiry form pre-filled. The user must review it, complete the human verification and press Send themselves.",
            inputSchema: {
                type: "object",
                properties: {
                    name: { type: "string" },
                    email: { type: "string" },
                    phone: { type: "string" },
                    subject: { type: "string" },
                    message: { type: "string" },
                    timeline: { type: "string", enum: ["urgent", "1-3months", "3-6months", "flexible", "not-sure"] },
                    budget: { type: "string", enum: ["under-5k", "5k-15k", "15k-50k", "50k-plus", "not-sure", "confidential"] },
                    preferred_contact: { type: "string", enum: ["email", "phone", "meeting", "video"] },
                },
            },
            execute: async (fields) => {
                try {
                    sessionStorage.setItem("propify:contact-prefill", JSON.stringify(fields ?? {}));
                } catch (error) {
                    return text("Could not store the form details in this browser.");
                }

                window.location.assign(siteData().contactUrl ?? "/contact");

                return text("The contact form is opening pre-filled. Ask the user to review it and press Send.");
            },
        },
    ];

    try {
        if (typeof navigator.modelContext.registerTool === "function") {
            tools.forEach((tool) => navigator.modelContext.registerTool(tool));
        } else if (typeof navigator.modelContext.provideContext === "function") {
            navigator.modelContext.provideContext({ tools });
        }
    } catch (error) {
        console.warn("WebMCP tool registration failed", error);
    }
}
