<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script> -->
    <!-- <script src="https://cdn.ckeditor.com/4.15.1/standard-all/ckeditor.js"></script> -->
    <!-- <script src="https://cdn.ckeditor.com/4.15.1/full-all/ckeditor.js"></script> -->
    <!-- <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>

</head>
<body>
    <textarea cols="80" id="editor2" name="editor2" rows="10" data-sample-short></textarea>
    
    <script>
        CKEDITOR.replace('editor2', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
</body>
</html>