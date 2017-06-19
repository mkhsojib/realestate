<li>
    <a href="{{url('adminpanel')}}">
        <i class="fa fa-dashboard"></i>
        <span>الواجه الرئيسية</span>
    </a>
</li>

<li>
    <a href="{{url('adminpanel/sitesettings')}}">
        <i class="fa fa-gears"></i>
        <span>إعدادات الموقع</span>
    </a>
</li>

<!-- Users -->
<li class="treeview">
    <a href="#">
        <i class="fa fa-users"></i>
        <span> <i class="fa fa-angle-left pull-left" style="margin-top: -18px"></i>الاعضاء</span>
    </a>

    <ul class="treeview-menu">
        <li><a href="{{url('adminpanel/users/create')}}"><i class="fa fa-circle-o"></i> اضف عضو</a></li>
        <li><a href="{{url('adminpanel/users')}}"><i class="fa fa-circle-o"></i> كل الاعضاء</a></li>
    </ul>
</li>

<!-- Buildings -->
<li class="treeview">
    <a href="#">
        <i class="fa fa-building"></i>
        <span>العقارات</span>
        <span><i class="fa fa-angle-left pull-left" style="margin-top: -18px"></i></span>
    </a>

    <ul class="treeview-menu">
        <li><a href="{{url('adminpanel/building/create')}}"><i class="fa fa-circle-o"></i> اضف عقار</a></li>
        <li><a href="{{url('adminpanel/building')}}"><i class="fa fa-circle-o"></i> كل الاعقارات</a></li>
    </ul>
</li>

<!-- Messages -->
<li class="treeview">
    <a href="{{url('adminpanel/contact')}}">
        <i class="fa fa-envelope"></i>
        <span>الرسائل</span>
    </a>
</li>

<!-- Chart -->
<li class="treeview">
    <a href="{{url('adminpanel/chart')}}">
        <i class="fa fa-bar-chart"></i>
        <span>احصائية إضافة العقارات</span>
    </a>
</li>