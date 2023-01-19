<?php
include('connect_db.php');

$sql = "SELECT * FROM dtbase_nckh.student WHERE id_student='".$_GET['id']."';";
$session = "c";

$sql1 = "SELECT (SELECT count(*) FROM dtbase_nckh.attend WHERE id_student='".$_GET['id']."' and status=0) as vang,
(SELECT count(*) FROM dtbase_nckh.attend WHERE id_student='".$_GET['id']."' and status=1) as vangphep,
(SELECT count(*) FROM dtbase_nckh.attend WHERE id_student='".$_GET['id']."' and status=2) as comat,
(SELECT count(*) FROM dtbase_nckh.attend WHERE id_student='".$_GET['id']."') as buoi,
(SELECT count(*) FROM dtbase_nckh.attend, dtbase_nckh.schedule WHERE attend.id_schedule=schedule.id_schedule and (checkin-begin)>0 and id_student='".$_GET['id']."') as tre;";

$result = $conn->query($sql);
$result1 = $conn->query($sql1);

foreach ($result as $row) {
  $id = $row["id_student"];
  $name = $row["fullname"];
  $email = $row["email"];
  $phone = $row["phone"];
  $id_class = $row["id_class"];
  $gender = $row["gender"];
  $id_student = $row["id_student"];
};

foreach ($result1 as $row) {
  $vang = $row["vang"];
  $vangphep = $row["vangphep"];
  $comat = $row["comat"];
  $buoi = $row["buoi"];
  $tre = $row["tre"];
};
?>


<html lang="en" data-theme="light">
<?php include('head.php'); ?>
<body><div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary"><?php include('navbar.php'); ?><div class="flex-lg-1 h-screen overflow-y-lg-auto">
<nav class="navbar navbar-light position-lg-sticky top-lg-0 d-none d-lg-block overlap-10 flex-none bg-white border-bottom px-0 py-3" id="topbar">
        <div class="container-fluid">
          <div class="hstack gap-2">
            <button type="button" class="btn btn-sm btn-square bg-tertiary bg-opacity-20 bg-opacity-100-hover text-tertiary text-white-hover">C</button> 
            <button type="button" class="btn btn-sm btn-square bg-primary bg-opacity-20 bg-opacity-100-hover text-primary text-white-hover">D</button> 
            <button type="button" class="btn btn-sm btn-square bg-warning bg-opacity-20 bg-opacity-100-hover text-warning text-white-hover">A</button> 
            <button type="button" class="btn btn-sm btn-square btn-neutral border-dashed shadow-none"><i class="bi bi-plus-lg"></i></button></div>
            <form class="form-inline ms-auto me-4 d-none d-md-flex"><div class="input-group input-group-inline shadow-none"><span class="input-group-text border-0 shadow-none ps-0 pe-3">
              <i class="bi bi-search"></i> </span><input type="text" class="form-control form-control-flush" placeholder="Search" aria-label="Search"></div></form>
              <div class="navbar-user d-none d-sm-block">
                <div class="hstack gap-3 ms-4">
                  <div class="dropdown">
                    <a href="#" class="nav-link px-3 text-base text-muted text-opacity-70 text-opacity-100-hover" id="dropdown-notifications" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-bell-fill"></i></a>
                      <div class="dropdown-menu dropdown-menu-end px-2" aria-labelledby="dropdown-notifications">
                        <div class="dropdown-item d-flex align-items-center">
                          <h6 class="dropdown-header p-0 m-0 font-semibold">Notifications</h6>
                          <a href="#" class="text-sm font-semibold ms-auto">Clear all</a>
                        </div>
                        <div class="dropdown-item py-3 d-flex"><div>
                          <div class="avatar bg-tertiary text-white rounded-circle">RF</div></div>
                          <div class="flex-fill ms-3">
                            <div class="text-sm lg-snug w-64 text-wrap">
                              <a href="#" class="font-semibold text-heading text-primary-hover">Robert</a> sent a message to <a href="#" class="font-semibold text-heading text-primary-hover">Webpixels</a></div><span class="text-muted text-xs">30 mins ago</span></div></div><div class="dropdown-item py-3 d-flex"><div><img alt="..." src="images/people-img-1.jpg" class="avatar rounded-circle"></div><div class="flex-fill ms-3"><div class="text-sm lg-snug w-64 text-wrap"><a href="#" class="font-semibold text-heading text-primary-hover">Robert</a> sent a message to <a href="#" class="font-semibold text-heading text-primary-hover">Webpixels</a></div><span class="text-muted text-xs">30 mins ago</span></div></div><div class="dropdown-item py-3 d-flex"><div><img alt="..." src="images/people-img-2.jpg" class="avatar rounded-circle"></div><div class="flex-fill ms-3"><div class="text-sm lg-snug w-64 text-wrap"><a href="#" class="font-semibold text-heading text-primary-hover">Robert</a> sent a message to <a href="#" class="font-semibold text-heading text-primary-hover">Webpixels</a></div><span class="text-muted text-xs">30 mins ago</span></div></div><div class="dropdown-item py-3 d-flex"><div><div class="avatar bg-success text-white rounded-circle">KW</div></div><div class="flex-fill ms-3"><div class="text-sm lg-snug w-64 text-wrap"><a href="#" class="font-semibold text-heading text-primary-hover">Robert</a> sent a message to <a href="#" class="font-semibold text-heading text-primary-hover">Webpixels</a></div><span class="text-muted text-xs">30 mins ago</span></div></div><div class="dropdown-item py-3 d-flex"><div><img alt="..." src="images/people-img-4.jpg" class="avatar rounded-circle"></div><div class="flex-fill ms-3"><div class="text-sm lg-snug w-64 text-wrap"><a href="#" class="font-semibold text-heading text-primary-hover">Robert</a> sent a message to <a href="#" class="font-semibold text-heading text-primary-hover">Webpixels</a></div><span class="text-muted text-xs">30 mins ago</span></div></div><div class="dropdown-divider"></div><div class="dropdown-item py-2 text-center"><a href="#" class="font-semibold text-muted text-primary-hover">View all</a></div></div></div></div></div></div></nav>
  <header class="bg-surface-secondary"><div class="bg-cover" style="height:100px;background-image:url(/img/covers/img-profile.jpg);background-position:center center"></div><div class="container-fluid max-w-screen-xl"><div class="row g-0"><div class="col-auto"><a href="#" class="avatar w-40 h-40 border border-body border-4 rounded-circle shadow mt-n16"><img alt="..." src="data/mat_hoc_sinh/<?php echo $id; ?>.jpg" class="rounded-circle"></a></div><div class="col ps-4 pt-4"><h6 class="text-xs text-uppercase text-muted mb-1">học sinh</h6><h1 class="h2"><?php echo $name; ?></h1></div><div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3 hstack gap-2 mt-4 mt-sm-0"><a href="#" class="btn btn-sm btn-primary d-block d-md-inline-block ms-auto ms-md-0">Chỉnh sửa</a></div></div></div></header><main class="py-6 bg-surface-secondary"><div class="container-fluid max-w-screen-xl"><div class="row g-6"><div class="col-xl-6"><div class="vstack gap-6"><div><div class="row g-6"><div class="col-xl-6 col-sm-6 col-12"><div class="card"><div class="card-body"><div class="row"><div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Vắng không phép</span> <span class="h3 font-bold mb-0"><?php echo $vang; ?></span></div><div class="col-auto"><div class="icon icon-shape bg-danger text-white text-lg rounded-circle"><i class="bi bi-emoji-frown"></i></div></div></div></div></div></div><div class="col-xl-6 col-sm-6 col-12"><div class="card"><div class="card-body"><div class="row"><div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Vắng có phép</span> <span class="h3 font-bold mb-0"><?php echo $vangphep; ?></span></div><div class="col-auto"><div class="icon icon-shape bg-warning text-white text-lg rounded-circle"><i class="bi bi-emoji-neutral"></i></div></div></div></div></div></div><div class="col-xl-6 col-sm-6 col-12"><div class="card"><div class="card-body"><div class="row"><div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">tỷ lệ tham gia học</span> <span class="h3 font-bold mb-0"><?php echo 100*$comat/$buoi; ?>%</span></div><div class="col-auto"><div class="icon icon-shape bg-success text-white text-lg rounded-circle"><i class="bi bi-emoji-laughing"></i></div></div></div></div></div></div><div class="col-xl-6 col-sm-6 col-12"><div class="card"><div class="card-body"><div class="row"><div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Số buổi đi trễ</span> <span class="h3 font-bold mb-0"><?php echo $tre; ?></span></div><div class="col-auto"><div class="icon icon-shape bg-primary text-white text-lg rounded-circle"><i class="bi bi-hourglass-split"></i></div></div></div></div></div></div></div></div></div></div><div class="col-xl-6"><div class="vstack gap-6"><div class="card"><div class="card-body"><h5 class="mb-4">Thông tin cá nhân</h5>

  <div class="d-flex align-items-center"><i class="bi bi-geo-alt-fill me-2 text-muted"></i> <a href="#" class="text-sm text-heading text-primary-hover">Lớp: <?php echo $id_class; ?></a></div>
  <div class="d-flex align-items-center"><i class="bi bi-gender-ambiguous me-2 text-muted"></i> <a href="#" class="text-sm text-heading text-primary-hover">Giới tính: <?php echo $gender; ?></a></div>
  <div class="d-flex align-items-center"><i class="bi bi-person-bounding-box me-2 text-muted"></i> <a href="#" class="text-sm text-heading text-primary-hover">ID: <?php echo $id_student; ?></a></div>
</div></div><div class="card"><div class="card-body"><h5 class="mb-4">Thông tin liên hệ</h5><div class="vstack gap-4"><div class="d-flex align-items-center"><i class="bi bi-envelope-fill me-2 text-muted"></i> <a href="#" class="text-sm text-heading text-primary-hover"><?php echo $email; ?></a></div><div class="d-flex align-items-center"><i class="bi bi-telephone-fill me-2 text-muted"></i> <a href="#" class="text-sm text-heading text-primary-hover"><?php echo $phone; ?></a></div></div></div></div></div></div></div></div></main></div></div><script src="js/js-main.js"></script><svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1002"></defs><polyline id="SvgjsPolyline1003" points="0,0"></polyline><path id="SvgjsPath1004" d="M0 0 "></path></svg></body>