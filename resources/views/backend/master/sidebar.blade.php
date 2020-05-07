<!-- sidebar right-->
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

    <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
    </div>

    <ul class="nav menu">
        <li @yield('index')><a href="admin"><svg class="glyph stroked dashboard-dial">
                    <use xlink:href="#stroked-dashboard-dial"></use>
                </svg> Tổng quan</a></li>
        <li @yield('category')><a href="admin/category"><svg class="glyph stroked clipboard with paper">
                    <use xlink:href="#stroked-clipboard-with-paper" /></svg> Danh Mục</a></li>
        <li @yield('product')><a href="admin/product"><svg class="glyph stroked bag">
                    <use xlink:href="#stroked-bag"></use>
                </svg> Sản phẩm</a></li>
        <li @yield('order')><a href="admin/order"><svg class="glyph stroked notepad ">
                    <use xlink:href="#stroked-notepad" /></svg> Đơn hàng</a></li>
        <li @yield('comment')><a href="admin/comment"><svg class="glyph stroked two messages">
                    <use xlink:href="#stroked-two-messages" /></svg> Bình luận</a></li>
        <li @yield('banner')><a href="admin/banner"><svg class="glyph stroked video">
                    <use xlink:href="#stroked-video" /></svg> Banner QC</a></li>
        <li @yield('attr')><a href="admin/attr"><svg class="glyph stroked notepad ">
                    <use xlink:href="#stroked-notepad" /></svg> Thuộc Tính</a></li>
        <li @yield('user_registered')><a href="admin/user-registered"><svg class="glyph stroked notepad ">
                    <use xlink:href="#stroked-notepad" /></svg> Đăg Ký Nhận Mail</a></li>
        <li @yield('user_question')><a href="admin/user-question"><svg class="glyph stroked notepad ">
                    <use xlink:href="#stroked-notepad" /></svg> Hỏi Đáp</a></li>



        <li role="presentation" class="divider"></li>
        <li @yield('user')><a href="admin/user"><svg class="glyph stroked male-user">
                    <use xlink:href="#stroked-male-user"></use>
                </svg> Quản lý thành viên</a></li>
        <li><a href="login.html"><svg class="glyph stroked male-user">
                    <use xlink:href="#stroked-male-user"></use>
                </svg> Login Page</a></li>
    </ul>

</div>
<!--/. end sidebar right-->