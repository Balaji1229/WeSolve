<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Enquiry</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f5f7; font-family:Arial, Helvetica, sans-serif; color:#1f2937;">
    <div style="max-width:600px; margin:0 auto; padding:24px;">
        <div style="background:#305CDE; border-radius:12px 12px 0 0; padding:24px 28px;">
            <h1 style="margin:0; color:#ffffff; font-size:20px;">New Contact Enquiry</h1>
            <p style="margin:6px 0 0; color:#dbe4ff; font-size:13px;">WeSolve Technologies — website contact form</p>
        </div>

        <div style="background:#ffffff; border:1px solid #e5e7eb; border-top:none; border-radius:0 0 12px 12px; padding:28px;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size:14px; line-height:1.6;">
                <tr>
                    <td style="padding:8px 0; width:120px; color:#6b7280; vertical-align:top;">Name</td>
                    <td style="padding:8px 0; font-weight:bold;">{{ $contact->name }}</td>
                </tr>
                <tr>
                    <td style="padding:8px 0; color:#6b7280; vertical-align:top;">Email</td>
                    <td style="padding:8px 0;"><a href="mailto:{{ $contact->email }}" style="color:#305CDE;">{{ $contact->email }}</a></td>
                </tr>
                <tr>
                    <td style="padding:8px 0; color:#6b7280; vertical-align:top;">Phone</td>
                    <td style="padding:8px 0;">{{ $contact->phone ?: '—' }}</td>
                </tr>
                <tr>
                    <td style="padding:8px 0; color:#6b7280; vertical-align:top;">Service</td>
                    <td style="padding:8px 0;">{{ $contact->service ?: '—' }}</td>
                </tr>
                <tr>
                    <td style="padding:8px 0; color:#6b7280; vertical-align:top;">Submitted</td>
                    <td style="padding:8px 0;">{{ $contact->created_at?->format('M d, Y · h:i A') }}</td>
                </tr>
            </table>

            <div style="margin-top:20px; padding-top:20px; border-top:1px solid #e5e7eb;">
                <p style="margin:0 0 8px; color:#6b7280; font-size:13px;">Message</p>
                <div style="background:#f9fafb; border:1px solid #e5e7eb; border-radius:8px; padding:16px; font-size:14px; line-height:1.7; white-space:pre-wrap;">{{ $contact->message }}</div>
            </div>

            <p style="margin:24px 0 0; font-size:12px; color:#9ca3af;">
                Reply directly to this email to respond to {{ $contact->name }}.
            </p>
        </div>
    </div>
</body>
</html>
