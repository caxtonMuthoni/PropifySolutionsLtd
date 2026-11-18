<x-layouts.app :seo="$seo">
    <x-ui.page-hero title="Terms of Service" :breadcrumbs="[['label' => 'Terms of Service']]">
        <p class="mt-4 text-sm text-muted">Last updated: <time datetime="{{ $updatedAt }}">{{ $updatedAt }}</time></p>
    </x-ui.page-hero>
    <div class="container-page pb-24">
        <div class="prose-article mx-auto max-w-3xl">
            <p>These terms govern your use of this website, operated by {{ $site['legalName'] }}, a company based in {{ $site['address'] }}. By using the website you agree to these terms.</p>
            <h2>Use of the website</h2>
            <p>You may use this website to learn about our services and contact us. You must not misuse it, attempt to gain unauthorised access, or interfere with its operation. Automated access by search engines and AI agents is welcome, provided it respects our robots.txt and does not degrade the service.</p>
            <h2>Information on this website</h2>
            <p>Content is provided for general information. Timelines and descriptions shown on this website are indicative only and do not form an offer. A binding engagement is created only by a signed proposal or agreement.</p>
            <h2>Client engagements</h2>
            <p>Software development services are governed by the proposal, statement of work or master services agreement signed for each engagement. Unless agreed otherwise in writing, intellectual property in deliverables transfers to the client on full payment.</p>
            <h2>Intellectual property</h2>
            <p>The Propify Solutions name, logo and website content are our property. Product names and logos of third parties shown on this website belong to their respective owners.</p>
            <h2>Liability</h2>
            <p>To the extent permitted by law, we are not liable for any indirect or consequential loss arising from use of this website.</p>
            <h2>Governing law</h2>
            <p>These terms are governed by the laws of Kenya, and the courts of Kenya have jurisdiction over any dispute.</p>
            <h2>Contact</h2>
            <p>Questions about these terms? Email <a href="mailto:{{ $site['contact']['email'] }}">{{ $site['contact']['email'] }}</a>.</p>
        </div>
    </div>
</x-layouts.app>
