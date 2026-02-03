<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Received - Propify Solutions</title>
    <style>
        /* Inline styles for email compatibility */
        @media only screen and (max-width: 600px) {
            .container {
                width: 100% !important;
            }

            .mobile-padding {
                padding-left: 20px !important;
                padding-right: 20px !important;
            }
        }
    </style>
</head>

<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; background-color: #f3f4f6;">
    <!-- Main Container -->
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f3f4f6;">
        <tr>
            <td align="center">
                <!-- Email Container -->
                <table class="container" width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; margin: 40px auto; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                    <!-- Header -->
                    <tr>
                        <td class="mobile-padding" style="padding: 40px 48px 0 48px;">
                            <table width="100%">
                                <tr>
                                    <td align="center">
                                        <!-- Logo - Using table for centering -->
                                        <table cellpadding="0" cellspacing="0" align="center" style="margin: 0 auto 24px;">
                                            <tr>
                                                <td style="width: 60px; height: 60px; background: linear-gradient(135deg, #3b82f6, #1d4ed8); border-radius: 12px; text-align: center; vertical-align: middle;">
                                                    <span style="color: white; font-size: 24px; font-weight: bold; line-height: 60px;">P</span>
                                                </td>
                                            </tr>
                                        </table>
                                        <h1 style="font-size: 28px; font-weight: bold; color: #1f2937; margin: 0 0 8px;">Propify Solutions Ltd</h1>
                                        <p style="color: #6b7280; margin: 0; font-size: 16px;">Software Development Agency</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td class="mobile-padding" style="padding: 40px 48px;">
                            <!-- Success Icon -->
                            <table width="100%" style="margin-bottom: 32px;">
                                <tr>
                                    <td align="center">
                                        <!-- Check circle - Using table for centering -->
                                        <table cellpadding="0" cellspacing="0" align="center" style="margin: 0 auto 24px;">
                                            <tr>
                                                <td style="width: 80px; height: 80px; background-color: #dbeafe; border-radius: 50%; text-align: center; vertical-align: middle;">
                                                    <span style="color: #3b82f6; font-size: 40px; line-height: 80px;">✓</span>
                                                </td>
                                            </tr>
                                        </table>
                                        <h2 style="font-size: 24px; font-weight: bold; color: #1f2937; margin: 0 0 16px;">Message Received!</h2>
                                        <p style="color: #6b7280; font-size: 16px; line-height: 24px; margin: 0;">
                                            Thank you for reaching out to Propify Solutions. We've received your message and will get back to you soon.
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <!-- Message Details Card -->
                            <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8fafc; border-radius: 8px; padding: 24px; margin: 32px 0; border: 1px solid #e5e7eb;">
                                <tr>
                                    <td>
                                        <h3 style="font-size: 18px; font-weight: 600; color: #1f2937; margin: 0 0 16px;">Message Details</h3>

                                        <!-- Details Grid -->
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="padding: 8px 0;">
                                                    <span style="color: #6b7280; font-size: 14px; display: block;">Name:</span>
                                                    <span style="color: #1f2937; font-size: 16px; font-weight: 500;">{{ $contactData['name'] }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px 0;">
                                                    <span style="color: #6b7280; font-size: 14px; display: block;">Email:</span>
                                                    <span style="color: #1f2937; font-size: 16px; font-weight: 500;">{{ $contactData['email'] }}</span>
                                                </td>
                                            </tr>
                                            @if(isset($contactData['subject']))
                                            <tr>
                                                <td style="padding: 8px 0;">
                                                    <span style="color: #6b7280; font-size: 14px; display: block;">Subject:</span>
                                                    <span style="color: #1f2937; font-size: 16px; font-weight: 500;">{{ ucfirst(str_replace('-', ' ', $contactData['subject'])) }}</span>
                                                </td>
                                            </tr>
                                            @endif
                                            @if(isset($contactData['message']))
                                            <tr>
                                                <td style="padding: 8px 0;">
                                                    <span style="color: #6b7280; font-size: 14px; display: block;">Message:</span>
                                                    <p style="color: #1f2937; font-size: 16px; line-height: 24px; margin: 8px 0 0;">{{ $contactData['message'] }}</p>
                                                </td>
                                            </tr>
                                            @endif
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- Next Steps -->
                            <table width="100%" style="margin: 32px 0;">
                                <tr>
                                    <td>
                                        <h3 style="font-size: 18px; font-weight: 600; color: #1f2937; margin: 0 0 16px;">What Happens Next?</h3>
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="padding: 12px 0; border-bottom: 1px solid #e5e7eb;">
                                                    <table width="100%">
                                                        <tr>
                                                            <td width="32" style="vertical-align: top; padding-right: 16px;">
                                                                <!-- Number circle using table -->
                                                                <table cellpadding="0" cellspacing="0" style="width: 24px; height: 24px;">
                                                                    <tr>
                                                                        <td style="background-color: #3b82f6; border-radius: 50%; text-align: center; vertical-align: middle;">
                                                                            <span style="color: white; font-weight: bold; font-size: 14px; line-height: 24px;">1</span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td style="vertical-align: top;">
                                                                <p style="color: #1f2937; font-size: 16px; font-weight: 500; margin: 0 0 4px;">Review & Assessment</p>
                                                                <p style="color: #6b7280; font-size: 14px; line-height: 20px; margin: 0;">Our team will review your inquiry and assess your requirements.</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 12px 0; border-bottom: 1px solid #e5e7eb;">
                                                    <table width="100%">
                                                        <tr>
                                                            <td width="32" style="vertical-align: top; padding-right: 16px;">
                                                                <!-- Number circle using table -->
                                                                <table cellpadding="0" cellspacing="0" style="width: 24px; height: 24px;">
                                                                    <tr>
                                                                        <td style="background-color: #3b82f6; border-radius: 50%; text-align: center; vertical-align: middle;">
                                                                            <span style="color: white; font-weight: bold; font-size: 14px; line-height: 24px;">2</span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td style="vertical-align: top;">
                                                                <p style="color: #1f2937; font-size: 16px; font-weight: 500; margin: 0 0 4px;">Initial Response</p>
                                                                <p style="color: #6b7280; font-size: 14px; line-height: 20px; margin: 0;">You'll receive an initial response from our team within 24 hours.</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 12px 0;">
                                                    <table width="100%">
                                                        <tr>
                                                            <td width="32" style="vertical-align: top; padding-right: 16px;">
                                                                <!-- Number circle using table -->
                                                                <table cellpadding="0" cellspacing="0" style="width: 24px; height: 24px;">
                                                                    <tr>
                                                                        <td style="background-color: #3b82f6; border-radius: 50%; text-align: center; vertical-align: middle;">
                                                                            <span style="color: white; font-weight: bold; font-size: 14px; line-height: 24px;">3</span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td style="vertical-align: top;">
                                                                <p style="color: #1f2937; font-size: 16px; font-weight: 500; margin: 0 0 4px;">Detailed Discussion</p>
                                                                <p style="color: #6b7280; font-size: 14px; line-height: 20px; margin: 0;">We'll schedule a call or meeting to discuss your project in detail.</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- Contact Info -->
                            <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8fafc; border-radius: 8px; padding: 24px; margin: 32px 0; border: 1px solid #e5e7eb;">
                                <tr>
                                    <td>
                                        <h3 style="font-size: 18px; font-weight: 600; color: #1f2937; margin: 0 0 16px;">Need Immediate Assistance?</h3>
                                        <table width="100%">
                                            <tr>
                                                <td style="padding: 8px 0;">
                                                    <table>
                                                        <tr>
                                                            <td style="padding-right: 12px; vertical-align: top;">
                                                                <!-- Phone icon -->
                                                                <table cellpadding="0" cellspacing="0" style="width: 20px; height: 20px;">
                                                                    <tr>
                                                                        <td style="text-align: center; vertical-align: middle;">
                                                                            <span style="color: #3b82f6; font-size: 20px; line-height: 20px;">📞</span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td style="vertical-align: top;">
                                                                <p style="color: #1f2937; font-size: 16px; font-weight: 500; margin: 0;">Office Hours</p>
                                                                <p style="color: #6b7280; font-size: 14px; margin: 4px 0 0;">Monday - Friday: 8:00 AM - 6:00 PM EAT</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 8px 0;">
                                                    <table>
                                                        <tr>
                                                            <td style="padding-right: 12px; vertical-align: top;">
                                                                <!-- Location icon -->
                                                                <table cellpadding="0" cellspacing="0" style="width: 20px; height: 20px;">
                                                                    <tr>
                                                                        <td style="text-align: center; vertical-align: middle;">
                                                                            <span style="color: #3b82f6; font-size: 20px; line-height: 20px;">📍</span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td style="vertical-align: top;">
                                                                <p style="color: #1f2937; font-size: 16px; font-weight: 500; margin: 0;">Visit Our Office</p>
                                                                <p style="color: #6b7280; font-size: 14px; margin: 4px 0 0;">Westlands Business Centre, 4th Floor, Nairobi</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- CTA Button -->
                            <table width="100%" style="margin: 40px 0 0;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ route('home') }}" style="display: inline-block; background-color: #3b82f6; color: white; text-decoration: none; padding: 16px 32px; border-radius: 8px; font-weight: 600; font-size: 16px; transition: background-color 0.2s;">Visit Our Website</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding: 40px 48px; background-color: #1f2937; color: #9ca3af;">
                            <table width="100%">
                                <tr>
                                    <td align="center">
                                        <!-- Logo in Footer -->
                                        <div style="margin-bottom: 24px;">
                                            <!-- Logo - Using table for centering -->
                                            <table cellpadding="0" cellspacing="0" align="center" style="margin: 0 auto 12px;">
                                                <tr>
                                                    <td style="width: 40px; height: 40px; background: linear-gradient(135deg, #3b82f6, #1d4ed8); border-radius: 8px; text-align: center; vertical-align: middle;">
                                                        <span style="color: white; font-size: 18px; font-weight: bold; line-height: 40px;">P</span>
                                                    </td>
                                                </tr>
                                            </table>
                                            <p style="color: white; font-size: 18px; font-weight: bold; margin: 0 0 4px;">Propify Solutions Ltd</p>
                                            <p style="font-size: 14px; margin: 0;">Software Development Agency</p>
                                        </div>

                                        <!-- Social Links -->
                                        <table cellpadding="0" cellspacing="0" style="margin: 24px auto;">
                                            <tr>
                                                <td style="padding: 0 8px;">
                                                    <a href="#" style="color: #9ca3af; text-decoration: none;">Website</a>
                                                </td>
                                                <td style="padding: 0 8px;">
                                                    <a href="#" style="color: #9ca3af; text-decoration: none;">LinkedIn</a>
                                                </td>
                                                <td style="padding: 0 8px;">
                                                    <a href="#" style="color: #9ca3af; text-decoration: none;">Twitter</a>
                                                </td>
                                                <td style="padding: 0 8px;">
                                                    <a href="#" style="color: #9ca3af; text-decoration: none;">Instagram</a>
                                                </td>
                                            </tr>
                                        </table>

                                        <!-- Copyright -->
                                        <p style="font-size: 14px; margin: 24px 0 0;">
                                            &copy; {{ date('Y') }} Propify Solutions Ltd. All rights reserved.<br>
                                            Westlands Business Centre, 4th Floor, Nairobi, Kenya
                                        </p>
                                        <p style="font-size: 12px; margin: 16px 0 0; color: #6b7280;">
                                            This is an automated message. Please do not reply to this email.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>