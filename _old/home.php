<?php

/*
    Every pages will be calling the same `home` and `footer`
    layout.
*/

include('layout/header.php');

print('
    <main>
        <div class="container">
            <div class="card">
                <h2>Home</h2>
                <p>This is home page</p>
            </div>
        </div>
    </main>
');

include('layout/footer.php');