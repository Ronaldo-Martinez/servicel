<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tus credenciales de acceso</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f6fb; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #334155;">
    <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #f4f6fb; padding: 40px 15px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 14px rgba(0,0,0,0.06);">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #171e3b; padding: 32px 40px; text-align: center; border-bottom: 4px solid #fed116;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 700; letter-spacing: 0.5px;">
                                {{ config('app.name', 'SERVICEL') }}
                            </h1>
                            <p style="margin: 6px 0 0 0; color: #cbd5e1; font-size: 13px; text-transform: uppercase; letter-spacing: 1px;">
                                Panel de Administración
                            </p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding: 40px 40px 32px 40px;">
                            <h2 style="margin: 0 0 16px 0; color: #0f172a; font-size: 20px; font-weight: 600;">
                                ¡Hola, {{ $user->name }}!
                            </h2>
                            <p style="margin: 0 0 24px 0; font-size: 15px; line-height: 1.6; color: #475569;">
                                Se ha habilitado tu cuenta para acceder a la plataforma de gestión de <strong>Servicel</strong>. A continuación encontrarás tus credenciales temporales para ingresar al sistema:
                            </p>

                            <!-- Credentials Box -->
                            <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; margin-bottom: 28px;">
                                <tr>
                                    <td style="padding: 20px 24px;">
                                        <div style="margin-bottom: 12px;">
                                            <span style="display: block; font-size: 12px; text-transform: uppercase; color: #64748b; font-weight: 600; letter-spacing: 0.5px;">Correo de acceso:</span>
                                            <span style="font-size: 15px; color: #0f172a; font-weight: 600;">{{ $user->email }}</span>
                                        </div>
                                        <div>
                                            <span style="display: block; font-size: 12px; text-transform: uppercase; color: #64748b; font-weight: 600; letter-spacing: 0.5px;">Contraseña temporal:</span>
                                            <span style="display: inline-block; font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, monospace; font-size: 18px; font-weight: 700; color: #1e293b; background: #e2e8f0; padding: 6px 14px; border-radius: 6px; letter-spacing: 1.5px; margin-top: 4px;">
                                                {{ $temporaryPassword }}
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <!-- Important Notice -->
                            <div style="background-color: #fffbeb; border-left: 4px solid #f59e0b; padding: 14px 18px; border-radius: 4px; margin-bottom: 28px;">
                                <p style="margin: 0; font-size: 13px; line-height: 1.5; color: #92400e;">
                                    <strong>Aviso de seguridad:</strong> Al iniciar sesión por primera vez se te solicitará cambiar esta contraseña temporal por una contraseña personal definitiva.
                                </p>
                            </div>

                            <!-- Button -->
                            <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" style="padding-bottom: 16px;">
                                        <a href="{{ $loginUrl }}" target="_blank" style="display: inline-block; background-color: #171e3b; color: #fed116; font-size: 15px; font-weight: 700; text-decoration: none; padding: 14px 36px; border-radius: 8px; box-shadow: 0 4px 10px rgba(23, 30, 59, 0.25);">
                                            Iniciar Sesión Ahora &rarr;
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8fafc; padding: 24px 40px; text-align: center; border-top: 1px solid #e2e8f0;">
                            <p style="margin: 0; font-size: 12px; color: #94a3b8;">
                                Este es un mensaje automático del sistema de Servicel Ingeniería. Si no solicitaste este acceso, por favor comunícate con tu administrador.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
