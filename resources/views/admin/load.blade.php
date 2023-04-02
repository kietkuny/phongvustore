<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Loading</title>
  <style>
    #loading {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    #loading .spinner-border {
      width: 3rem;
      height: 3rem;
      margin-right: 0.5rem;
    }

    #loading p {
      color: white;
    }
  </style>
</head>
<body>
  <div id="loading">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    <p>Đang đăng nhập...</p>
  </div>
</body>
</html>