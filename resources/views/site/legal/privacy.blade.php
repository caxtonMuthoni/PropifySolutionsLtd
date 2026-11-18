<x-layouts.app :seo="$seo">
    <x-ui.page-hero title="Privacy Policy" :breadcrumbs="[['label' => 'Privacy Policy']]">
        <p class="mt-4 text-sm text-muted">Last updated: <time datetime="{{ $updatedAt }}">{{ $updatedAt }}</time></p>
    </x-ui.page-hero>
    <div class="container-page pb-24">
        <div class="prose-article mx-auto max-w-3xl">
            <p>{{ $site['legalName'] }} ("we", "us") respects your privacy. This policy explains how we collect, use and protect personal data when you visit this website or work with us, in line with the Kenya Data Protection Act, 2019 and other applicable data protection laws in the countries we serve.</p>
            <h2>Data we collect</h2>
            <ul>
                <li><strong>Enquiry details</strong> you submit through our contact form: name, email address, phone number, project description, budget, timeline and preferred contact method.</li>
                <li><strong>Technical data</strong> such as IP address, browser type and pages visited, collected through server logs and security tools.</li>
                <li><strong>Client project data</strong> that we process on your behalf under a separate agreement.</li>
            </ul>
            <h2>How we use your data</h2>
            <ul>
                <li>To respond to your enquiry and prepare proposals.</li>
                <li>To deliver and support the services you engage us for.</li>
                <li>To protect our website from spam and abuse (we use Cloudflare Turnstile for this).</li>
                <li>To meet legal, tax and accounting obligations.</li>
            </ul>
            <p>We do not sell your personal data, and we do not use enquiry data to train AI models.</p>
            <h2>Legal basis</h2>
            <p>We process personal data on the basis of your consent, to take steps before entering a contract with you, to perform a contract, and for our legitimate interest in running and securing our business.</p>
            <h2>Sharing</h2>
            <p>We share data only with service providers who help us operate — such as hosting, email delivery and security providers — under appropriate confidentiality and data protection terms. Some providers may process data outside your country; where this happens we rely on appropriate safeguards.</p>
            <h2>Retention</h2>
            <p>We keep enquiry data for up to 24 months after our last contact, and project records for as long as required by contract and law.</p>
            <h2>Your rights</h2>
            <p>You may request access to, correction of, or deletion of your personal data, object to processing, or withdraw consent at any time. Email <a href="mailto:{{ $site['contact']['email'] }}">{{ $site['contact']['email'] }}</a> and we will respond within the time required by law. You also have the right to complain to the Office of the Data Protection Commissioner (Kenya) or your local data protection authority.</p>
            <h2>Security</h2>
            <p>We use encryption in transit, access controls, and regular updates to protect personal data. No method of transmission over the internet is completely secure, but we work hard to protect your information.</p>
            <h2>Contact</h2>
            <p>{{ $site['legalName'] }}, {{ $site['address'] }}. Email: <a href="mailto:{{ $site['contact']['email'] }}">{{ $site['contact']['email'] }}</a>. Phone: {{ $site['contact']['phone_display'] }}.</p>
        </div>
    </div>
</x-layouts.app>
