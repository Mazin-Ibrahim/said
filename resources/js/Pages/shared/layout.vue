<template>
    <div>
        <div
            id="kt_header_mobile"
            class="header-mobile align-items-center header-mobile-fixed"
        >
            <!--begin::Logo-->
            <a href="index.html">
                <img alt="Logo" src="assets/media/logos/logo-light.png" />
            </a>
            <!--end::Logo-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Aside Mobile Toggle-->
                <button
                    class="btn p-0 burger-icon burger-icon-left"
                    id="kt_aside_mobile_toggle"
                >
                    <span></span>
                </button>
                <!--end::Aside Mobile Toggle-->
                <!--begin::Header Menu Mobile Toggle-->
                <button
                    class="btn p-0 burger-icon ml-4"
                    id="kt_header_mobile_toggle"
                >
                    <span></span>
                </button>
                <!--end::Header Menu Mobile Toggle-->
                <!--begin::Topbar Mobile Toggle-->
                <button
                    class="btn btn-hover-text-primary p-0 ml-2"
                    id="kt_header_mobile_topbar_toggle"
                >
                    <span class="svg-icon svg-icon-xl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px"
                            height="24px"
                            viewBox="0 0 24 24"
                            version="1.1"
                        >
                            <g
                                stroke="none"
                                stroke-width="1"
                                fill="none"
                                fill-rule="evenodd"
                            >
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path
                                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                    fill="#000000"
                                    fill-rule="nonzero"
                                    opacity="0.3"
                                />
                                <path
                                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                    fill="#000000"
                                    fill-rule="nonzero"
                                />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </button>
                <!--end::Topbar Mobile Toggle-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Header Mobile-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="d-flex flex-row flex-column-fluid page">
                <!--begin::Aside-->
                <div
                    class="aside aside-left aside-fixed d-flex flex-column flex-row-auto"
                    id="kt_aside"
                >
                    <!--begin::Brand-->
                    <div class="brand flex-column-auto" id="kt_brand">
                        <!--begin::Logo-->
                        <a href="index.html" class="brand-logo">
                            <img
                                alt="Logo"
                                src="assets/media/logos/logo-light.png"
                            />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Toggle-->
                        <button
                            class="brand-toggle btn btn-sm px-0"
                            id="kt_aside_toggle"
                        >
                            <span class="svg-icon svg-icon svg-icon-xl">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px"
                                    height="24px"
                                    viewBox="0 0 24 24"
                                    version="1.1"
                                >
                                    <g
                                        stroke="none"
                                        stroke-width="1"
                                        fill="none"
                                        fill-rule="evenodd"
                                    >
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path
                                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                            fill="#000000"
                                            fill-rule="nonzero"
                                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"
                                        />
                                        <path
                                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                            fill="#000000"
                                            fill-rule="nonzero"
                                            opacity="0.3"
                                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"
                                        />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </button>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Brand-->
                    <!--begin::Aside Menu-->
                    <div
                        class="aside-menu-wrapper flex-column-fluid"
                        id="kt_aside_menu_wrapper"
                    >
                        <!--begin::Menu Container-->
                        <div
                            id="kt_aside_menu"
                            class="aside-menu my-4"
                            data-menu-vertical="1"
                            data-menu-scroll="1"
                            data-menu-dropdown-timeout="500"
                        >
                            <!--begin::Menu Nav-->
                            <ul class="menu-nav">
                                <li
                                    class="menu-item menu-item-active"
                                    aria-haspopup="true"
                                >
                                    <a href="index.html" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px"
                                                height="24px"
                                                viewBox="0 0 24 24"
                                                version="1.1"
                                            >
                                                <g
                                                    stroke="none"
                                                    stroke-width="1"
                                                    fill="none"
                                                    fill-rule="evenodd"
                                                >
                                                    <polygon
                                                        points="0 0 24 0 24 24 0 24"
                                                    />
                                                    <path
                                                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                        fill="#000000"
                                                        fill-rule="nonzero"
                                                    />
                                                    <path
                                                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                        fill="#000000"
                                                        opacity="0.3"
                                                    />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-text">Dashboard</span>
                                    </a>
                                </li>

                                <li
                                    class="menu-item menu-item-submenu"
                                    aria-haspopup="true"
                                    data-menu-toggle="hover"
                                >
                                    <Link 
                                        href="/categories"
                                        class="menu-link menu-toggle"
                                    >
                                        <span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px"
                                                height="24px"
                                                viewBox="0 0 24 24"
                                                version="1.1"
                                            >
                                                <g
                                                    stroke="none"
                                                    stroke-width="1"
                                                    fill="none"
                                                    fill-rule="evenodd"
                                                >
                                                    <rect
                                                        x="0"
                                                        y="0"
                                                        width="24"
                                                        height="24"
                                                    />
                                                    <rect
                                                        fill="#000000"
                                                        opacity="0.3"
                                                        x="4"
                                                        y="4"
                                                        width="8"
                                                        height="16"
                                                    />
                                                    <path
                                                        d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z"
                                                        fill="#000000"
                                                        fill-rule="nonzero"
                                                    />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-text">الاصناف</span>
                                        <i class="menu-arrow"></i>
                                    </Link>
                                   
                                </li>

                                 <li
                                    class="menu-item menu-item-submenu"
                                    aria-haspopup="true"
                                    data-menu-toggle="hover"
                                >
                                    <Link 
                                        href="/departments"
                                        class="menu-link menu-toggle"
                                    >
                                        <span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px"
                                                height="24px"
                                                viewBox="0 0 24 24"
                                                version="1.1"
                                            >
                                                <g
                                                    stroke="none"
                                                    stroke-width="1"
                                                    fill="none"
                                                    fill-rule="evenodd"
                                                >
                                                    <rect
                                                        x="0"
                                                        y="0"
                                                        width="24"
                                                        height="24"
                                                    />
                                                    <rect
                                                        fill="#000000"
                                                        opacity="0.3"
                                                        x="4"
                                                        y="4"
                                                        width="8"
                                                        height="16"
                                                    />
                                                    <path
                                                        d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z"
                                                        fill="#000000"
                                                        fill-rule="nonzero"
                                                    />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-text">الاقسام</span>
                                        <i class="menu-arrow"></i>
                                    </Link>
                                   
                                </li>

                                
                            </ul>
                            <!--end::Menu Nav-->
                        </div>
                        <!--end::Menu Container-->
                    </div>
                    <!--end::Aside Menu-->
                </div>
                <!--end::Aside-->
                <!--begin::Wrapper-->
                <div
                    class="d-flex flex-column flex-row-fluid wrapper"
                    id="kt_wrapper"
                >
                    <!--begin::Header-->
                    <div id="kt_header" class="header header-fixed">
                        <!--begin::Container-->
                        <div
                            class="container-fluid d-flex align-items-stretch justify-content-between"
                        >
                            <!--begin::Header Menu Wrapper-->
                            <div
                                class="header-menu-wrapper header-menu-wrapper-left"
                                id="kt_header_menu_wrapper"
                            >
                                <!--begin::Header Menu-->
                                <div
                                    id="kt_header_menu"
                                    class="header-menu header-menu-mobile header-menu-layout-default"
                                ></div>
                                <!--end::Header Menu-->
                            </div>
                            <!--end::Header Menu Wrapper-->
                            <!--begin::Topbar-->
                            <div class="topbar">
                                <!--begin::Search-->
                                <div
                                    class="dropdown"
                                    id="kt_quick_search_toggle"
                                >
                                    <!--begin::Toggle-->
                                    <div
                                        class="topbar-item"
                                        data-toggle="dropdown"
                                        data-offset="10px,0px"
                                    >
                                        <div
                                            class="btn btn-icon btn-clean btn-lg btn-dropdown mr-1"
                                        >
                                            <span
                                                class="svg-icon svg-icon-xl svg-icon-primary"
                                            >
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    width="24px"
                                                    height="24px"
                                                    viewBox="0 0 24 24"
                                                    version="1.1"
                                                >
                                                    <g
                                                        stroke="none"
                                                        stroke-width="1"
                                                        fill="none"
                                                        fill-rule="evenodd"
                                                    >
                                                        <rect
                                                            x="0"
                                                            y="0"
                                                            width="24"
                                                            height="24"
                                                        />
                                                        <path
                                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                            fill="#000000"
                                                            fill-rule="nonzero"
                                                            opacity="0.3"
                                                        />
                                                        <path
                                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                            fill="#000000"
                                                            fill-rule="nonzero"
                                                        />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Toggle-->
                                    <!--begin::Dropdown-->
                                    <div
                                        class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg"
                                    >
                                        <div
                                            class="quick-search quick-search-dropdown"
                                            id="kt_quick_search_dropdown"
                                        >
                                            <!--begin:Form-->
                                            <form
                                                method="get"
                                                class="quick-search-form"
                                            >
                                                <div class="input-group">
                                                    <div
                                                        class="input-group-prepend"
                                                    >
                                                        <span
                                                            class="input-group-text"
                                                        >
                                                            <span
                                                                class="svg-icon svg-icon-lg"
                                                            >
                                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                                                <svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="24px"
                                                                    height="24px"
                                                                    viewBox="0 0 24 24"
                                                                    version="1.1"
                                                                >
                                                                    <g
                                                                        stroke="none"
                                                                        stroke-width="1"
                                                                        fill="none"
                                                                        fill-rule="evenodd"
                                                                    >
                                                                        <rect
                                                                            x="0"
                                                                            y="0"
                                                                            width="24"
                                                                            height="24"
                                                                        />
                                                                        <path
                                                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                            fill="#000000"
                                                                            fill-rule="nonzero"
                                                                            opacity="0.3"
                                                                        />
                                                                        <path
                                                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                            fill="#000000"
                                                                            fill-rule="nonzero"
                                                                        />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        placeholder="Search..."
                                                    />
                                                    <div
                                                        class="input-group-append"
                                                    >
                                                        <span
                                                            class="input-group-text"
                                                        >
                                                            <i
                                                                class="quick-search-close ki ki-close icon-sm text-muted"
                                                            ></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </form>
                                            <!--end::Form-->
                                            <!--begin::Scroll-->
                                            <div
                                                class="quick-search-wrapper scroll"
                                                data-scroll="true"
                                                data-height="325"
                                                data-mobile-height="200"
                                            ></div>
                                            <!--end::Scroll-->
                                        </div>
                                    </div>
                                    <!--end::Dropdown-->
                                </div>

                                <!--begin::Languages-->
                                <div class="dropdown">
                                    <!--begin::Toggle-->
                                    <div
                                        class="topbar-item"
                                        data-toggle="dropdown"
                                        data-offset="10px,0px"
                                    >
                                        <div
                                            class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1"
                                        >
                                            <img
                                                class="h-20px w-20px rounded-sm"
                                                src="assets/media/svg/flags/226-united-states.svg"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                    <!--end::Toggle-->
                                    <!--begin::Dropdown-->
                                    <div
                                        class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right"
                                    >
                                        <!--begin::Nav-->
                                        <ul class="navi navi-hover py-4">
                                            <!--begin::Item-->
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span
                                                        class="symbol symbol-20 mr-3"
                                                    >
                                                        <img
                                                            src="assets/media/svg/flags/226-united-states.svg"
                                                            alt=""
                                                        />
                                                    </span>
                                                    <span class="navi-text"
                                                        >English</span
                                                    >
                                                </a>
                                            </li>
                                        </ul>
                                        <!--end::Nav-->
                                    </div>
                                    <!--end::Dropdown-->
                                </div>
                                <!--end::Languages-->
                                <!--begin::User-->

                                <!--end::User-->
                            </div>
                            <!--end::Topbar-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Content-->
                    <div
                        class="content d-flex flex-column flex-column-fluid"
                        id="kt_content"
                    >
                        <!--begin::Subheader-->
                        <div
                            class="subheader py-2 py-lg-4 subheader-solid"
                            id="kt_subheader"
                        ></div>
                        <!--end::Subheader-->
                        <!--begin::Entry-->
                        <div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class="container">
                                <!--begin::Dashboard-->
                                <!--begin::Row-->
                                <div class="row mt-10">
                                 
                                        

                                          
                                                 <slot />
                                          
                                       
                                    
                              <flash v-if="$page.flash" :type="$page.flash.type" :popstate="$page.popstate">{{ $page.flash.message}}</flash>

                                    <div
                                        class="col-lg-12 col-xxl-4 order-1 order-xxl-2"
                                    ></div>
                                </div>
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Footer-->
                    <div
                        class="footer bg-white py-4 d-flex flex-lg-column"
                        id="kt_footer"
                    >
                        <!--begin::Container-->
                        <div
                            class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between"
                        >
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-muted font-weight-bold mr-2"
                                    >2020©</span
                                >
                                <a
                                    href="http://keenthemes.com/metronic"
                                    target="_blank"
                                    class="text-dark-75 text-hover-primary"
                                    >Keenthemes</a
                                >
                            </div>
                            <!--end::Copyright-->
                            <!--begin::Nav-->
                            <div class="nav nav-dark">
                                <a
                                    href="http://keenthemes.com/metronic"
                                    target="_blank"
                                    class="nav-link pl-0 pr-5"
                                    >About</a
                                >
                                <a
                                    href="http://keenthemes.com/metronic"
                                    target="_blank"
                                    class="nav-link pl-0 pr-5"
                                    >Team</a
                                >
                                <a
                                    href="http://keenthemes.com/metronic"
                                    target="_blank"
                                    class="nav-link pl-0 pr-0"
                                    >Contact</a
                                >
                            </div>
                            <!--end::Nav-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Main-->
        <!-- begin::User Panel-->
    </div>
</template>

<script>
import Flash from "../shared/flash.vue";
 import { Link } from '@inertiajs/inertia-vue'
export default {
   components: {Flash,Link},
       
};
</script>
