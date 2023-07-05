<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    input[readonly] {
        background-color: white !important;
        cursor: text !important;
    }

    /* this is only due to codepen display don't use this outside of codepen */
    .container {
        padding-top: 120px;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Blog Posting</h1>
                <form action="/addBlog" method="POST" role="form">
                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" value="" placeholder="Blog Title:" required />
                    </div>
                    <br>
                    <div class="form-group">
                        <textarea class="form-control bcontent" id="body" name="body" value=" " placeholder="Enter Your Blog Description Here: " required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="users_id" value="{{$id}}" />
                    </div>
                    <br>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>