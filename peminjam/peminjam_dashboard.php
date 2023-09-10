<?php
    //    require '../middleware/auth_middleware.php';
    //  checkRole("user", '../middleware/auth_prohibit.php');
    ?>

    <!-- <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Alat Produksi</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>


    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>

    </html> -->

    <?php
    require '../controller/koneksi.php';
    require '../middleware/auth_middleware.php';

    checkRole("peminjam", 'middleware/auth_prohibit.php');
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Divisi Harkan</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <style>
            .card-text {
                text-align: justify;
            }
        </style>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/svg+xml" href="/assets/img/pal.svg">


    </head>

    <?php include 'peminjam_sidebar.php' ?>
    <br>
    <br>

    <body>
        <div id="layoutSidenav_content">
            <main id="main-content" class="<?= isset($_GET['sidebarClosed']) ? '' : 'main-with-sidebar' ?>">
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <br>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Ajukan Peminjaman</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="peminjam_transaksional.php">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Riwayat Peminjaman</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="peminjam_history.php">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Form Peminjaman Barang</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="transaksional.php">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Form Pengembalian Barang</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="transaksional_kembali.php">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">List Daftar Mutasi Barang</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="mutasibarang.php">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Manajemen Akun & Data Personil</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="user_manajemen.php">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid px-4 carousel-container mt-4">
                    <div class="card text-center">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <button id="prevBtn" class="btn btn-primary"><i class="fas fa-chevron-left"></i></button>
                                <h2>PENGUMUMAN</h2>
                                <button id="nextBtn" class="btn btn-primary"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Jokowi: ASEAN Tak Akan Tersandera Isu Myanmar</h5>
                            <p class="card-text mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, ipsum cumque quasi incidunt ea expedita asperiores omnis quas ipsa cupiditate officiis? Quidem iusto culpa esse eum optio nesciunt alias, quas, voluptate molestias eos dicta eveniet cumque nisi, quibusdam illo modi incidunt necessitatibus eligendi repellat? Quos a minima illum. Qui eos odit repellat fuga. Voluptate, eius. Dolores sequi velit eius minus itaque earum laborum eos repellendus delectus tenetur suscipit a voluptatem, harum quia necessitatibus quae commodi cupiditate aliquam nesciunt sit explicabo culpa quisquam repudiandae! Autem veritatis libero dolor deserunt unde ducimus fugit repellat facilis doloremque? Eligendi alias labore commodi reprehenderit inventore illo harum dolor doloribus numquam voluptatibus libero, et aspernatur? Inventore voluptatem quaerat illum molestias consequuntur mollitia ea nisi pariatur minus? Unde, nulla! Ut eos esse hic vero rerum quas facilis perspiciatis sint, ipsa eius nesciunt. Vero, et. Accusamus soluta cumque voluptates veritatis, sunt odit omnis delectus laborum exercitationem maxime provident dolorum nisi sit sapiente quisquam dicta porro iusto ab a corporis quae iste recusandae modi? Vel fugit laborum reprehenderit odio ipsum perspiciatis non natus adipisci, error deleniti dolorum eaque dicta, mollitia, sed voluptate blanditiis dolorem odit voluptatem aperiam cumque rerum animi laboriosam in! Sapiente quidem ipsam voluptate libero voluptatibus repellat, totam atque, deleniti eveniet, distinctio natus harum reprehenderit delectus? Sequi reiciendis, architecto iure consequuntur modi, ex dolorum eos iusto magnam quo corporis eum distinctio et ducimus optio eius? Blanditiis ea iusto et vero odit, iure natus culpa quas dicta a alias beatae vel ex ab consequatur provident ipsam magni, est voluptate necessitatibus cumque ullam. Recusandae atque facere totam assumenda sapiente dolore voluptatum cupiditate, dolores quas nesciunt libero magni neque doloribus amet tempore? Placeat quam unde tempora molestiae fugiat vero praesentium nemo itaque, aut, culpa atque consequuntur impedit a expedita inventore libero aliquid, eum assumenda accusantium quae ab nostrum. Eius libero hic, cumque earum necessitatibus repellat. Tempora eos, iste aut est odit voluptatibus voluptates, nam totam esse veritatis at voluptate? Ducimus aperiam ipsum labore reprehenderit sed illo, consequatur laudantium illum odio, deserunt sint repudiandae excepturi asperiores dignissimos nihil, eos iusto voluptate explicabo sapiente obcaecati itaque tempora. Expedita aliquid reiciendis qui excepturi adipisci itaque et nemo, quod cupiditate, maxime delectus ut dicta dolore perspiciatis voluptate labore corrupti? Voluptas itaque in eveniet mollitia possimus dolorum veritatis, ducimus cumque neque sed! Repudiandae vel labore amet mollitia quasi, debitis alias illum odio, non, repellat atque sint maiores magnam deleniti? Aut libero explicabo modi molestias earum quod ipsa fuga commodi. Animi dolores deserunt provident nam odit alias eius aliquid sint harum tempora optio excepturi totam soluta magnam officia quia possimus sapiente perferendis corporis, asperiores distinctio earum unde doloremque vel. Dolorum id consequatur inventore unde debitis dolorem natus quis fuga rem maxime quo magni, blanditiis sunt, consequuntur ducimus incidunt dolore consectetur, minima praesentium. Magnam nobis maiores beatae dolorum earum dolor id odit perspiciatis at rerum. Voluptates mollitia nostrum voluptas quam eveniet ab veniam sint minima numquam veritatis optio blanditiis, unde iste, magnam sit aspernatur odio. Voluptates cum dolore praesentium odit, debitis enim, ipsa rem, impedit reiciendis eius maxime repellendus quidem ut dolor. Sit, aspernatur assumenda. Nulla rerum perspiciatis, illo pariatur alias exercitationem quibusdam dolore minima possimus quae illum quam voluptatibus adipisci, nihil architecto, nesciunt necessitatibus? Nemo, cum explicabo! Veniam inventore, fugiat optio laborum eaque quibusdam enim accusamus odio quidem! Quod, quo. Similique praesentium perferendis animi voluptates laboriosam ipsam ullam? Minus, vero nihil. Eum libero repudiandae nesciunt! Eos natus amet cumque eaque perspiciatis ad enim molestias architecto est, quibusdam laborum provident, necessitatibus pariatur eius sit. Tenetur inventore reprehenderit ducimus quod magnam aut, ab dignissimos cupiditate ad rem voluptates! Voluptas repellendus labore sit quas autem inventore reiciendis eligendi minima, facere ex odio minus excepturi porro? Odio obcaecati impedit possimus excepturi ex praesentium corporis sequi laudantium facilis vel veritatis voluptatem iusto adipisci ducimus, aut architecto officiis ea? Enim ab velit cum eius debitis explicabo ipsum perferendis quibusdam cupiditate! Exercitationem repellat molestiae assumenda officiis ab asperiores totam eos quasi repudiandae. Sapiente maxime qui cumque ipsa nemo totam quidem voluptates necessitatibus vitae esse? Laborum recusandae officia dolorum ratione quo adipisci vel nostrum nihil sapiente aperiam dignissimos delectus, nisi, corrupti obcaecati ut reprehenderit magnam suscipit ullam pariatur natus animi at eaque iste? Quis similique aperiam commodi quibusdam facere, provident id quidem a minus delectus repellat eum expedita dolor molestias sed asperiores dicta esse. Sequi nam deleniti nostrum. Molestiae excepturi obcaecati doloremque voluptate maxime corporis consectetur accusamus similique fugit accusantium sapiente architecto, quibusdam odit laborum amet ipsa asperiores totam ullam eaque voluptas praesentium assumenda. Ut officia sint odio, non, quibusdam molestias cumque quo nostrum, iusto dolor laudantium eveniet corporis aliquid quaerat ipsum alias in eaque sapiente animi similique. Consequuntur eaque fugit dolore beatae nostrum impedit, dolor reiciendis placeat itaque eum debitis cum? Atque, repudiandae. Dicta at dolorum corrupti rerum tempore laborum reiciendis soluta quis, nisi officia consectetur consequuntur beatae hic dolore. Quibusdam quia expedita beatae dolorem, voluptatem eos recusandae! Possimus dignissimos inventore cupiditate, incidunt sit non voluptatibus voluptatum quia ipsam laudantium deserunt beatae enim veritatis repellat consectetur quibusdam corporis magni ab ea necessitatibus nihil. Vero minus id optio pariatur libero deleniti unde odio cupiditate voluptate, quibusdam ipsum. Neque dignissimos eos eius consequatur ducimus laborum fugiat ipsum nihil voluptatem alias ipsa magni, adipisci nesciunt harum eaque. Asperiores provident, obcaecati a numquam molestias et cupiditate aperiam corporis accusamus similique quas nisi rem nobis quis dolores doloremque illo eligendi eum facere quod ipsum error corrupti? Temporibus nostrum, quia ducimus eius magnam impedit mollitia nemo laudantium ratione beatae quaerat non veniam dignissimos hic molestias culpa ex debitis ipsa nesciunt! Sunt, molestias. Rerum deleniti fuga maxime deserunt quo! Odit eius reprehenderit mollitia itaque, enim ex omnis dicta repellendus maxime nemo et sunt, neque nam maiores! Ipsam perspiciatis modi nesciunt tempore, commodi sed iure aliquam adipisci asperiores quae unde dolorem itaque! Enim provident animi sint officiis culpa reprehenderit ipsum amet voluptas nihil eligendi magnam, aliquam laudantium natus nam beatae ipsa ab sit omnis consequuntur, perspiciatis dignissimos et tenetur! Ut commodi voluptates, non reiciendis rem distinctio et sapiente quaerat perspiciatis sint aperiam atque. Sequi esse earum adipisci quod? Distinctio, officiis voluptatem.</p>
                        </div>
                        <div class="card-footer text-muted">
                            2 days ago
                        </div>
                    </div>
                </div>
            </main>
        </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    </html>