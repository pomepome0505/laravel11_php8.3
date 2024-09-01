<head>
    <style>
        dialog {
            border: none;
            outline: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            padding: 5px 20px;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<div>
    @session('message')
        <dialog id="dialog">
            <p>{{ session('message') }}</p>
        </dialog>
    @endsession
    <h1>トップ画面</h1>
</div>
<script>
    const dialog = document.getElementById('dialog');
    dialog.show();

    setTimeout(() => {
        dialog.close();
    }, 3000);
</script>