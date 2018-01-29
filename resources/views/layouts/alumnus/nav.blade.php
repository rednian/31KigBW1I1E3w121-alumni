

<div class="sub-nav mb-24">
    <div class="container">
        <ul class="pull-left">
            <li><a href="alumnus.html">                 Profile         </a></li>
            <li><a href="company_visitor.html">         Jobs            </a></li>
            <li><a href="advertising_register.html">    Inbox           </a></li>
            <li><a href="account_sysad.html">           Transcript of Records         </a></li>
            <li><a href="reports_tesda.html">           Application     </a></li>
            <li><a href="">                             My Account      </a></li>
            <li><a href="">                             Download        </a></li>
        </ul>    
        <div class="alumnus-search pull-right">
            <div class="dropdown pull-left">
              <button class="btn btn-default btn-sm dropdown-toggle alumnus-btn" type="button" data-toggle="dropdown">Alumnus
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="#">Alumnus</a></li>
                <li><a href="#">Alumni</a></li>
                <li><a href="#">Aluminum</a></li>
              </ul>
            </div>
            <div class="search-container pull-right">
                <input type="text" placeholder="Search">
                <i class="fa fa-search"></i>
            </div>
        </div>

    </div>
</div>
<div class="greetings-pane myriad" style="margin-top:-25px;">
    <h6>
        <b>Greetings!! </b> <span>
        
        
        @if(Auth::check() && $user)
            
            {{ $user->alumnus_info->student_per_info->lname }}
            
        @else

            No Name

        @endif
        you can update your CV for additional information and have a privilege  to be hired...</span>
    </h6>
</div>
