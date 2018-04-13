<?php $active = \Request::segment(3); ?>


<div class="col-xs-2 s-pad">
    <div class="bg-white admin-left-pane" style="padding:0 15px;">
        <ul class="f-12">
            <li class="{{ $active == null ? 'active':''}}"><a href="{{route('report.tesda')}}" class="c-bright-green">TESDA</a></li>
            <li class="{{ $active == null ? 'active':''}}"><a href="{{route('report.tesda')}}" class="c-bright-green">Alumni</a></li>
        </ul>
    </div>
</div>