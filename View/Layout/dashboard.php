<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="row p-0 m-0">
        <div class="col-2 bg-primary position-fixed text-light" style="height: 100vh">
            <div class="d-flex justify-content-between align-items-center border-bottom">
                <div class="fw-bold fs-1">
                    <a href="/dashboard" class="text-light text-decoration-none">
                        Clinic
                    </a>
                </div>
                <div class="fs-2">
                    <form action="logout" method="POST">                        
                        <button class="bg-primary border-0 text-light" type="submit">
                            <i class="bi bi-door-open-fill"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div>
                <div class="fs-3">
                    Admin
                </div>
                <div class="border-start px-1 mx-2">
                    <div>
                        <a class="text-light text-decoration-none" href="/dashboard/admin/create">
                            Create
                        </a>
                    </div>
                    <div>
                        <a class="text-light text-decoration-none" href="/dashboard/admins">
                            Show
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10 position-fixed end-0 overflow-y-auto">
            {{content}}
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
