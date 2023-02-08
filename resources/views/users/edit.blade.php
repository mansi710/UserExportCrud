<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h5>User Edit</h5>
            </div>
            <div class="card-body">
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-md-4">
                        <label>Name:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="hidden" name="id" value="{{$user->id}}" class="form-control">
                        <input type="hidden" name="imageEdit" value="{{$user->profile_image}}" class="form-control">
                        <input type="text" name="name" value="{{$user->name}}" class="form-control">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-md-4">
                        <label>Email:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="email" value="{{$user->email}}" class="form-control">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-md-4">
                        <label>Images:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="file" name="image" class="form-control">
                        <div style="margin-top: 20px;">
                            <img src="{{asset('images/'.$user->profile_image)}}" height="100" width="100">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-md-4">
                        <label>IsAdmin:</label>
                    </div>
                    <div class="col-md-8">
                        @if($user->isAdmin == 0)
                        <input type="text" name="isAdmin" value="true" class="form-control">
                        @else
                        <input type="text" name="isAdmin" value="false" class="form-control">
                        @endif
                    </div>
                </div>
                <div class="row">
                 <div class="col-md-4">
                   <button type="submit" class="btn btn-success">Update</button>
                 </div>
               </div>
            </div>
        </div>
    </form>

</body>

</html>