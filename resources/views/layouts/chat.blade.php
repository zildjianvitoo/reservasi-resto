<style>
    .float-chat {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #7fad39;
        color: #fff;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        text-align: center;
        font-size: 24px;
        line-height: 60px;
        z-index: 1000;
        transition: all 0.3s ease-in-out;
    }

    .float-chat:hover {
        background-color: #46601f;
        transform: scale(1.1);
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-title {
        margin: 0;
    }

    .close {
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        outline: none;
    }

    .chat-container {
        height: 300px;
        overflow-y: scroll;
        margin-bottom: 20px;
    }

    .chat-bubble {
        display: inline-block;
        clear: both;
        margin: 10px 0;
        max-width: 60%;
        padding: 8px 12px;
        border-radius: 15px;
        font-size: 16px;
        line-height: 24px;
    }

    .received {
        background-color: #f1f0f0;
        float: left;
    }

    .sent {
        background-color: #dcf8c6;
        float: right;
    }

    .input-group {
        margin-top: 20px;
    }
</style>
<script>
    function openChat() {
        @if(session('isLogin'))
        document.getElementById("chatModal").style.display = "block";
        @else
            window.location.href = '/login';
        @endif
    }

    function closeChat() {
        document.getElementById("chatModal").style.display = "none";
    }
</script>

<a href="/pesan" class="float-chat">
    <i class="fa fa-comments"></i>
</a>


