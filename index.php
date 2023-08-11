<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Upload JavaScript with Progress Ba | CodingNepal</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <div class="wrapper" id="drop-area">
    <header>File Uploader JavaScript</header>
    <form action="#" id="upload_apk" enctype="multipart/form-data">
      <input class="file-input" type="file" name="file" hidden>
      <i class="fas fa-cloud-upload-alt"></i>
      <p>Browse File to Upload</p>
    </form>
    <section class="progress-area" id="progressArea"></section>
    <section class="uploaded-area" id="uploadedArea"></section>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.0.js" ></script>
  <script src="script.js"></script>

</body>
</html>