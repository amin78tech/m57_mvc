<?php $layout = 'main'; ?>

<div>
    <div class="mb-5">
        <h1 class="fs-1 text-center">
            Login
        </h1>
    </div>
    <form action="login" method="POST">
        <div class="row">
            <div class="col">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="col">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
        </div>
        <div class="my-3">
            <div class="d-grid gap-2">
                <input type="submit" value="Login" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>