@foreach ($messages as $msg)
    <div class="message {{ $msg->reply_user_position === 'A' ? 'right' : 'left' }}">
        <div class="bubble">
            {{ $msg->reply_detail }}
            <div class="time">{{ \Carbon\Carbon::parse($msg->reply_date_insert)->format('H:i') }}</div>
        </div>
    </div>
@endforeach
