<?php
$active = \Request::segment(3);
?>

<div class="col-xs-2 s-pad">
    <div class="bg-white admin-left-pane" style="padding:0 15px;">
        <ul class="f-12">
            <li class="{{ $active == null ? 'active':''}}"><a href="{{route('account.index')}}" class="c-bright-green">System Administrator</a></li>
            <li class="{{ $active == 'alumnus' ? 'active':''}}"><a href="{{route('alumnus.get_graduate')}}" class="c-bright-green">Alumnus</a></li>
            <li class="{{ $active == 'partner' ? 'active':''}}"><a href="{{route('partner.index')}}" class="c-bright-green">Partners</a></li>
        </ul>
    </div>
</div>