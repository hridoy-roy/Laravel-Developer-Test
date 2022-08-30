<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Quiz</li>
                <li>
                    <a href="{{ route('quiz.create') }}" class="waves-effect active">
                        <i class="bx bx-home-circle"></i>
                        <span>Add Questions</span>
                    </a>
                </li>
                <li class="menu-title">Translation Pages</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-share-alt"></i>
                        <span>Translation Multi_Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">translation Level_1.1</a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">translation Level_1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Translation Level_2.1</a></li>
                                <li><a href="javascript: void(0);">Translation Level_2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->