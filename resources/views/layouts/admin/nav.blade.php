<?php
$active = \Request::segment(2);
?>

<div class="sub-nav mb-24">
    <div class="container">
        <ul class="pull-left">
            <li><a <?php if($active == 'alumni'){echo 'class="active"'; } ?>href="{{route('alumni.index')}}">Alumnus</a></li>
            <li><a <?php if($active == 'company'){echo 'class="active"'; } ?> href="{{route('company.visitor')}}">Company</a></li>
            <li><a <?php if($active == 'advertisement'){echo 'class="active"'; } ?> href="{{route('advertisement.index')}}">Advertising</a></li>
            <li><a <?php if($active == 'account'){echo 'class="active"'; } ?>  href="{{route('account.index')}}">Account</a></li>
            <li><a href="reports_tesda.html">Reports</a></li>
            <li><a href="">Announcements</a></li>
            <li><a href="">Invitation</a></li>
        </ul>

    </div>
</div>