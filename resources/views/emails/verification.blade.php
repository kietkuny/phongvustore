<p>Xin chào {{ $customer->name }},</p>
<p>Vui lòng nhấn vào đường link sau để xác nhận địa chỉ email và kích hoạt tài khoản:</p>
<p><a href="{{ route('verify', $customer->gmail_verification_token) }}">{{ route('verify', $customer->gmail_verification_token) }}</a
