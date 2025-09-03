<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('dashboard')}}" role="button" aria-expanded="false"
                       aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <!-- end Dashboard Menu -->
                @if(Request::is('permissions/*')||Request::is('roles/*')||Request::is('users/*'))
                    @php($roleNav = true)
                @endif

{{--                @if(auth()->user()->id == 1)--}}
                @canany(['000251', '000250','000254','000255','000258','000259','000262','000263'])
                <li class="nav-item">
                    <a class="nav-link menu-link {{ isset($roleNav)?'active':'' }}" href="#sidebarRole"
                       data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarRole">
                        <i class="ri-user-2-fill"></i> <span data-key="t-apps">User Role</span>
                    </a>
                    <div class="collapse menu-dropdown {{ isset($roleNav)?'show':'' }}" id="sidebarRole">
                        <ul class="nav nav-sm flex-column">
                            @canany(['000251', '000250'])
                                <li class="nav-item">
                                    <a href="#sidebarCalendar"
                                       class="nav-link {{ Request::is('roles/admin')||Request::is('roles/permission-assign/*')?'active':'' }}"
                                       data-bs-toggle="collapse" role="button" aria-expanded="false"
                                       aria-controls="sidebarCalendar" data-key="t-calender">
                                        Role
                                    </a>
                                    <div
                                        class="collapse menu-dropdown {{ Request::is('roles/admin')||Request::is('roles/permission-assign/*')?'show':'' }}"
                                        id="sidebarCalendar">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{url('roles/admin')}}"
                                                   class="nav-link {{ Request::is('roles/admin')||Request::is('roles/permission-assign/*')?'active':'' }}"
                                                   data-key="t-main-calender"> Admin </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endcanany
                            @canany(['000254', '000254'])
                                <li class="nav-item">
                                    <a href="#sidebarEmail"
                                       class="nav-link {{ Request::is('permissions/admin')?'active':'' }}"
                                       data-bs-toggle="collapse" role="button" aria-expanded="false"
                                       aria-controls="sidebarEmail" data-key="t-email">
                                        Permission
                                    </a>
                                    <div class="collapse menu-dropdown {{ Request::is('permissions/admin')?'show':'' }}"
                                         id="sidebarEmail">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{url('permissions/admin')}}"
                                                   class="nav-link {{ Request::is('permissions/admin')?'active':'' }}"
                                                   data-key="t-mailbox"> Admin </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                            @endcanany
                            @canany(['000258', '000259','000262','000263'])
                                <li class="nav-item">
                                    <a href="#sidebarEcommerce"
                                       class="nav-link {{ (Request::is('users/manage-users')||Request::is('users/manage-users-permission')||Request::is('users/assign-revoke-permission/*'))?'active':'' }}"
                                       data-bs-toggle="collapse" role="button" aria-expanded="false"
                                       aria-controls="sidebarEcommerce" data-key="t-ecommerce">
                                        Users
                                    </a>
                                    <div
                                        class="collapse menu-dropdown {{ (Request::is('users/manage-users')||Request::is('users/manage-users-permission')||Request::is('users/assign-revoke-permission/*'))?'show':'' }}"
                                        id="sidebarEcommerce">
                                        <ul class="nav nav-sm flex-column">
                                            @canany(['000258','000259'])
                                                <li class="nav-item">
                                                    <a href="{{url('users/manage-users')}}"
                                                       class="nav-link {{ Request::is('users/manage-users')?'active':'' }}"
                                                       data-key="t-products"> Manage Users </a>
                                                </li>
                                            @endcanany
                                            @canany(['000262','000263'])
                                                <li class="nav-item">
                                                    <a href="{{url('users/manage-users-permission')}}"
                                                       class="nav-link {{ (Request::is('users/manage-users-permission')||Request::is('users/assign-revoke-permission/*'))?'active':'' }}"
                                                       data-key="t-products"> Manage Permission </a>
                                                </li>
                                            @endcanany
                                        </ul>
                                    </div>
                                </li>
                            @endcanany
                        </ul>
                    </div>
                </li>
                @endcanany
                @canany(['000242', '000243','000246','000247'])
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('lookup/admin')||Request::is('fileUpload/admin')?'active':'' }}"
                       href="#sidebarLayouts"
                       data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Additional</span>
                    </a>
                    <div class="collapse menu-dropdown {{ Request::is('lookup/admin')?'show':'' }}"
                         id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            @canany(['000242', '000243'])
                                <li class="nav-item">
                                    <a href="{{url('lookup/admin')}}"
                                       class="nav-link {{ Request::is('lookup/admin')?'active':'' }}"
                                       data-key="t-horizontal">Lookup</a>
                                </li>
                            @endcanany
                            @canany(['000246','000247'])
                                <li class="nav-item">
                                    <a href="{{url('fileUpload/admin')}}"
                                       class="nav-link {{ Request::is('fileUpload/admin')?'active':'' }}"
                                       data-key="t-horizontal">File Upload</a>
                                </li>
                            @endcanany
                        </ul>
                    </div>
                </li>
                @endcanany
{{--                @endif--}}

                <!-- HRM Nav Start -->

                @if(Request::is('companyInfo/*')||
                    Request::is('division/*')||
                    Request::is('district/*')||
                    Request::is('upazilla/*')||
                    Request::is('thana*')||
                    Request::is('post-office/*')||
                    Request::is('union/*')||
                    Request::is('textSetup/*')||
                    Request::is('branch/*')||
                    Request::is('department/*')||
                    Request::is('section/*')||
                    Request::is('subsection/*')||
                    Request::is('currencySetup/*')||
                    Request::is('currencySetup/history/*')||
                    Request::is('grade/*')||
                    Request::is('currencySetupCreate/*')||
                    Request::is('recruitmentNotice/*')||
                    Request::is('tempEmployee/*')||
                    Request::is('staffCat/*')||
                    Request::is('designationLevel/*')||
                    Request::is('designation/*')||
                    Request::is('salaryBreakdown/*')||
                    Request::is('shiftHead/*')||
                    Request::is('payrollHead/*')||
                    Request::is('currencySetupCreate/*')||
                    Request::is('employee/*')||
                    Request::is('employeeLetter/*')||
                    Request::is('employeeTransfer/*')||
                    Request::is('employeeSeperation/*')||
                    Request::is('deptMapping/*')||
                    Request::is('leaveHead/*')||
                    Request::is('empLeave/*')||
                    Request::is('empShiftAssign/*')||
                    Request::is('movementRegister/*')||
                    Request::is('hrm/employeeReport')||
                    Request::is('hrm/salaryReport')||
                    Request::is('holidaySetup/*')||
                    Request::is('empAttendenceTimeCorrection/*')||
                    Request::is('empAttendence/*')||
                    Request::is('empAllowance/*')||
                    Request::is('policy/*')||
                    Request::is('employeeSalary/*')||
                    Request::is('wages/*')||
                    Request::is('bonusPolicy/*')||
                    Request::is('otPolicy/*')||
                    Request::is('bonus/*')||
                    Request::is('empLoan/*')||
                    Request::is('adjustment/*')||
                    Request::is('empSettlement/*')||
                    Request::is('empIncrement/*')||
                    Request::is('workingdaySetup/*')||
                    Request::is('ksaHead/*')||
                    Request::is('kraHead/*')||
                    Request::is('fieldLabels/*')||
                    Request::is('humanResourceBudget/*')||
                    Request::is('empPromotion/*')
                    )

                    @php($hrmNav = true)
                @endif
                @if (Gate::any(['000002', '000006', '000010', '000014', '000018', '000022', '000026', '000030', '000034', '000038', '000042', '000046', '000051', '000091', '000222','000228','000055', '000268','000067', '000269','000073','000077','000081','000085','000089','000096','000100','000103','000105','000111','000118',
                    '000135','000137','000142','000146','000150','000154','000163','000167','000171','000175','000179','000185','000190','000194','000197','000210','000215','000235','000240','000241']))

                <li class="nav-item">
                    <a class="nav-link menu-link {{ isset($hrmNav)?'active':'' }}" href="#sidebarHRM"
                       data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarHRM">
                        <i class="ri-box-3-fill"></i> <span data-key="t-apps">HRM</span>
                    </a>
                    <div class="collapse menu-dropdown {{ isset($hrmNav)?'show':'' }}" id="sidebarHRM">

                        <ul class="nav nav-sm flex-column">
                            @if(Request::is('companyInfo/*')||
                                       Request::is('division/*')||
                                       Request::is('district/*')||
                                       Request::is('upazilla/*')||
                                       Request::is('thana*')||
                                       Request::is('post-office/*')||
                                       Request::is('union/*')||
                                       Request::is('textSetup/*')||
                                       Request::is('branch/*')||
                                       Request::is('department/*')||
                                       Request::is('section/*')||
                                       Request::is('subsection/*')||
                                       Request::is('currencySetup/*')||
                                       Request::is('currencySetup/history/*')||
                                       Request::is('ksaHead/*')||
                                       Request::is('kraHead/*')||
                                       Request::is('fieldLabels/*')||
                                       Request::is('currencySetupCreate/*'))
                                @php($basicConfigNav = true)
                            @endif

                            @if (Gate::any(['000002', '000006', '000010', '000014', '000018', '000022', '000026', '000030', '000034', '000038', '000042', '000046', '000051', '000091', '000222','000228']))
                                <li class="nav-item">
                                    <a href="#sidebarConfigure"
                                       class="nav-link {{ isset($basicConfigNav)?'active':'' }}"
                                       data-bs-toggle="collapse" role="button" aria-expanded="false"
                                       aria-controls="sidebarConfigure" data-key="t-calender">
                                        Basic Configure
                                    </a>
                                    <div class="collapse menu-dropdown {{ isset($basicConfigNav)?'show':'' }}"
                                         id="sidebarConfigure">
                                        <ul class="nav nav-sm flex-column">
                                            @can('000002')
                                                <li class="nav-item">
                                                    <a href="{{url('/companyInfo/admin')}}"
                                                       class="nav-link {{ Request::is('companyInfo/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Company Setup </a>
                                                </li>
                                            @endcan
                                            @can('00006')
                                                <li class="nav-item">
                                                    <a href="{{url('/division/admin')}}"
                                                       class="nav-link {{ Request::is('division/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Division Setup </a>
                                                </li>
                                            @endcan
                                            @can('000010')
                                                <li class="nav-item">
                                                    <a href="{{url('/district/admin')}}"
                                                       class="nav-link {{ Request::is('district/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> District Setup </a>
                                                </li>
                                            @endcan
                                            @can('000014')
                                                <li class="nav-item">
                                                    <a href="{{url('/upazilla/admin')}}"
                                                       class="nav-link {{ Request::is('upazilla/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Upazilla Setup </a>
                                                </li>
                                            @endcan
                                            @can('000018')
                                                <li class="nav-item">
                                                    <a href="{{url('/thana/admin')}}"
                                                       class="nav-link {{ Request::is('thana/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Thana Setup </a>
                                                </li>
                                            @endcan
                                            @can('000022')
                                                <li class="nav-item">
                                                    <a href="{{url('/post-office/admin')}}"
                                                       class="nav-link {{ Request::is('post-office/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Post Office Setup </a>
                                                </li>
                                            @endcan
                                            @can('000026')
                                                <li class="nav-item">
                                                    <a href="{{url('/union/admin')}}"
                                                       class="nav-link {{ Request::is('union/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Union Setup </a>
                                                </li>
                                            @endcan
                                            @can('000030')
                                                <li class="nav-item">
                                                    <a href="{{url('/textSetup/admin')}}"
                                                       class="nav-link {{ Request::is('textSetup/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Text Setup </a>
                                                </li>
                                            @endcan
                                            @can('000034')
                                                <li class="nav-item">
                                                    <a href="{{url('/branch/admin')}}"
                                                       class="nav-link {{ Request::is('branch/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Branch </a>
                                                </li>
                                            @endcan
                                            @can('000038')
                                                <li class="nav-item">
                                                    <a href="{{url('/department/admin')}}"
                                                       class="nav-link {{ Request::is('department/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Department </a>
                                                </li>
                                            @endcan
                                            @can('000042')
                                                <li class="nav-item">
                                                    <a href="{{url('/section/admin')}}"
                                                       class="nav-link {{ Request::is('section/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Section </a>
                                                </li>
                                            @endcan
                                            @can('000046')
                                                <li class="nav-item">
                                                    <a href="{{url('/subsection/admin')}}"
                                                       class="nav-link {{ Request::is('subsection/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender">Sub Section </a>
                                                </li>
                                            @endcan
                                            @can('000051')
                                                <li class="nav-item">
                                                    <a href="{{url('/currencySetup/admin')}}"
                                                       class="nav-link {{ Request::is('currencySetup/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender">Currency Setup </a>
                                                </li>
                                            @endcan
                                            @can('000091')
                                                <li class="nav-item">
                                                    <a href="{{url('/currencySetup/history')}}"
                                                       class="nav-link {{ Request::is('currencySetup/history') ? 'active' : '' }}"
                                                       data-key="t-main-calender">Currency History </a>
                                                </li>
                                            @endcan

                                            @can('000222')
                                                <li class="nav-item">
                                                    <a href="{{url('/ksaHead/admin')}}"
                                                       class="nav-link {{ Request::is('ksaHead/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender">KSA Head</a>
                                                </li>
                                            @endcan
                                            @can('000228')
                                                <li class="nav-item">
                                                    <a href="{{url('/kraHead/admin')}}"
                                                       class="nav-link {{ Request::is('kraHead/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender">KRA Head</a>
                                                </li>
                                            @endcan
                                            @can('000265')
                                                <li class="nav-item">
                                                    <a href="{{url('/fieldLabels/admin')}}"
                                                       class="nav-link {{ Request::is('fieldLabels/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender">Manage Field Labels</a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endif

                            @if (Gate::any(['000055', '000268']))

                                @if(Request::is('recruitmentNotice/*')||
                                   Request::is('tempEmployee/*'))
                                    @php($recruitmentNav = true)
                                @endif
                                <li class="nav-item">
                                    <a href="#sidebarRecruitment"
                                       class="nav-link {{ isset($recruitmentNav)?'active':'' }}"
                                       data-bs-toggle="collapse" role="button" aria-expanded="false"
                                       aria-controls="sidebarRecruitment" data-key="t-calender">
                                        Recruitment
                                    </a>
                                    <div class="collapse menu-dropdown {{ isset($recruitmentNav)?'show':'' }}"
                                         id="sidebarRecruitment">
                                        <ul class="nav nav-sm flex-column">
                                            @can('000055')
                                                <li class="nav-item">
                                                    <a href="{{url('/recruitmentNotice/admin')}}"
                                                       class="nav-link {{ Request::is('recruitmentNotice/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Recruitment Notice </a>
                                                </li>
                                            @endcan
                                            @can('000268')
                                                <li class="nav-item">
                                                    <a href="{{url('/tempEmployee/admin')}}"
                                                       class="nav-link {{ Request::is('tempEmployee/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Recruitment Process </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endif

                            @if (Gate::any(['000067', '000269','000073','000077','000081','000085','000089']))
                                @if(Request::is('grade/*')||
                                    Request::is('staffCat/*')||
                                    Request::is('designationLevel/*')||
                                    Request::is('designation/*')||
                                    Request::is('shiftHead/*')||
                                    Request::is('payrollHead/*')||
                                    Request::is('salaryBreakdown/*'))
                                    @php($employeeConfigNav = true)
                                @endif
                                <li class="nav-item">
                                    <a href="#sidebarEmployee"
                                       class="nav-link {{ isset($employeeConfigNav)?'active':'' }}"
                                       data-bs-toggle="collapse" role="button" aria-expanded="false"
                                       aria-controls="sidebarEmployee" data-key="t-calender">
                                        Employee Configure
                                    </a>
                                    <div class="collapse menu-dropdown {{ isset($employeeConfigNav)?'show':'' }}"
                                         id="sidebarEmployee">
                                        <ul class="nav nav-sm flex-column">
                                            @can('000067')
                                                <li class="nav-item">
                                                    <a href="{{url('/grade/admin')}}"
                                                       class="nav-link {{ Request::is('grade/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Grade </a>
                                                </li>
                                            @endcan
                                            @can('000269')
                                                <li class="nav-item">
                                                    <a href="{{url('/salaryBreakdown/admin')}}"
                                                       class="nav-link {{ Request::is('salaryBreakdown/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Salary Breakdown </a>
                                                </li>
                                            @endcan
                                            @can('000073')
                                                <li class="nav-item">
                                                    <a href="{{url('/staffCat/admin')}}"
                                                       class="nav-link {{ Request::is('staffCat/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Stuff Category </a>
                                                </li>
                                            @endcan
                                            @can('000077')
                                                <li class="nav-item">
                                                    <a href="{{url('/shiftHead/admin')}}"
                                                       class="nav-link {{ Request::is('shiftHead/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Shift Head </a>
                                                </li>
                                            @endcan
                                            @can('000081')
                                                <li class="nav-item">
                                                    <a href="{{url('/designationLevel/admin')}}"
                                                       class="nav-link {{ Request::is('designationLevel/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Designation Level </a>
                                                </li>
                                            @endcan
                                            @can('000085')
                                                <li class="nav-item">
                                                    <a href="{{url('/designation/admin')}}"
                                                       class="nav-link {{ Request::is('designation/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Designation </a>
                                                </li>
                                            @endcan
                                            @can('000089')
                                                <li class="nav-item">
                                                    <a href="{{url('/payrollHead/admin')}}"
                                                       class="nav-link {{ Request::is('payrollHead/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Payroll Head </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endif

                            @if (Gate::any(['000096']))

                                @if(Request::is('deptMapping/*'))
                                    @php($companyMappingNav = true)
                                @endif
                                <li class="nav-item">
                                    <a href="#companyMapping"
                                       class="nav-link {{ isset($companyMappingNav)?'active':'' }}"
                                       data-bs-toggle="collapse" role="button" aria-expanded="false"
                                       aria-controls="companyMapping" data-key="t-calender">
                                        Company Mapping
                                    </a>
                                    <div class="collapse menu-dropdown {{ isset($companyMappingNav)?'show':'' }}"
                                         id="companyMapping">
                                        <ul class="nav nav-sm flex-column">
                                            @can('000096')
                                                <li class="nav-item">
                                                    <a href="{{url('/deptMapping/admin')}}"
                                                       class="nav-link {{ Request::is('deptMapping/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Department Mapping </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endif

                            @if (Gate::any(['000100','000103','000105','000111','000118']))

                                @if(Request::is('employee/*')||
                                   Request::is('employeeLetter/*')||
                                   Request::is('employeeTransfer/*')||
                                   Request::is('employeeSeperation/*')||
                                   Request::is('policy/*')
                                   )
                                    @php($employeetNav = true)
                                @endif
                                <li class="nav-item">
                                    <a href="#sidebarEnployee" class="nav-link {{ isset($employeetNav)?'active':'' }}"
                                       data-bs-toggle="collapse" role="button" aria-expanded="false"
                                       aria-controls="sidebarEnployee" data-key="t-calender">
                                        Employee Management
                                    </a>
                                    <div class="collapse menu-dropdown {{ isset($employeetNav)?'show':'' }}"
                                         id="sidebarEnployee">
                                        <ul class="nav nav-sm flex-column">
                                            @can('000100')
                                                <li class="nav-item">
                                                    <a href="{{url('/employee/admin')}}"
                                                       class="nav-link {{ Request::is('employee/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Manage Employee </a>
                                                </li>
                                            @endcan
                                            @can('000103')
                                                <li class="nav-item">
                                                    <a href="{{url('/employeeLetter/manageLetter')}}"
                                                       class="nav-link {{ Request::is('employeeLetter/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Manage Employee Letter </a>
                                                </li>
                                            @endcan
                                            @can('000105')
                                                <li class="nav-item">
                                                    <a href="{{url('/employeeTransfer/admin')}}"
                                                       class="nav-link {{ Request::is('employeeTransfer/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Employee Transfer </a>
                                                </li>
                                            @endcan
                                            @can('000111')
                                                <li class="nav-item">
                                                    <a href="{{url('/employeeSeperation/admin')}}"
                                                       class="nav-link {{ Request::is('employeeSeperation/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Manage Seperation </a>
                                                </li>
                                            @endcan
                                            @can('000118')
                                                <li class="nav-item">
                                                    <a href="{{url('/policy/admin')}}"
                                                       class="nav-link {{ Request::is('policy/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Policy Setup </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endif

                            @if (Gate::any(['000123','000127']))
                                @if(Request::is('leaveHead/*')||Request::is('empLeave/*'))
                                    @php($leaveManagementNav = true)
                                @endif
                                <li class="nav-item">
                                    <a href="#leaveManagement"
                                       class="nav-link {{ isset($leaveManagementNav)?'active':'' }}"
                                       data-bs-toggle="collapse" role="button" aria-expanded="false"
                                       aria-controls="leaveManagement" data-key="t-calender">
                                        Leave Management
                                    </a>
                                    <div class="collapse menu-dropdown {{ isset($leaveManagementNav)?'show':'' }}"
                                         id="leaveManagement">
                                        <ul class="nav nav-sm flex-column">
                                            @can('000123')
                                                <li class="nav-item">
                                                    <a href="{{url('/leaveHead/admin')}}"
                                                       class="nav-link {{ Request::is('leaveHead/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Leave Head Setup </a>
                                                </li>
                                            @endcan
                                            @can('000127')
                                                <li class="nav-item">
                                                    <a href="{{url('/empLeave/admin')}}"
                                                       class="nav-link {{ Request::is('empLeave/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Take A Leave </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endif

                            @if (Gate::any(['000135','000137','000142','000146','000150','000154','000163','000167','000171','000175','000179']))
                                @if(Request::is('employeeSalary/*')||
                                 Request::is('wages/*')||
                                 Request::is('bonusPolicy/*')||
                                 Request::is('otPolicy/*')||
                                 Request::is('bonus/*')||
                                 Request::is('empLoan/*')||
                                 Request::is('adjustment/*')||
                                 Request::is('empAllowance/*')||
                                 Request::is('empSettlement/*')||
                                 Request::is('empIncrement/*')||
                                 Request::is('empPromotion/*')
                                 )
                                    @php($payrollNav = true)
                                @endif
                                <li class="nav-item">
                                    <a href="#sidebarPayroll" class="nav-link {{ isset($payrollNav)?'active':'' }}"
                                       data-bs-toggle="collapse" role="button" aria-expanded="false"
                                       aria-controls="sidebarPayroll" data-key="t-calender">
                                        Payroll Management
                                    </a>
                                    <div class="collapse menu-dropdown {{ isset($payrollNav)?'show':'' }}"
                                         id="sidebarPayroll">
                                        <ul class="nav nav-sm flex-column">
                                            @can('000135')
                                                <li class="nav-item">
                                                    <a href="{{url('/employeeSalary/admin')}}"
                                                       class="nav-link {{ Request::is('employeeSalary/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Salaray Manage </a>
                                                </li>
                                            @endcan
                                            @can('000137')
                                                <li class="nav-item">
                                                    <a href="{{url('/wages/admin')}}"
                                                       class="nav-link {{ Request::is('wages/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Wages Setup</a>
                                                </li>
                                            @endcan
                                            @can('000142')
                                                <li class="nav-item">
                                                    <a href="{{url('/bonusPolicy/admin')}}"
                                                       class="nav-link {{ Request::is('bonusPolicy/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Bonus Policy </a>
                                                </li>
                                            @endcan
                                            @can('000146')
                                                <li class="nav-item">
                                                    <a href="{{url('/otPolicy/admin')}}"
                                                       class="nav-link {{ Request::is('otPolicy/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> OT Policy </a>
                                                </li>
                                            @endcan
                                            @can('000150')
                                                <li class="nav-item">
                                                    <a href="{{url('/bonus/admin')}}"
                                                       class="nav-link {{ Request::is('bonus/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Bonus Setup </a>
                                                </li>
                                            @endcan
                                            @can('000154')
                                                <li class="nav-item">
                                                    <a href="{{url('/empLoan/admin')}}"
                                                       class="nav-link {{ Request::is('empLoan/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Emp Loan </a>
                                                </li>
                                            @endcan
                                            @can('000163')
                                                <li class="nav-item">
                                                    <a href="{{url('/adjustment/admin')}}"
                                                       class="nav-link {{ Request::is('adjustment/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Adjustment </a>
                                                </li>
                                            @endcan
                                            @can('000167')
                                                <li class="nav-item">
                                                    <a href="{{url('/empAllowance/admin')}}"
                                                       class="nav-link {{ Request::is('empAllowance/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Emp Allowance </a>
                                                </li>
                                            @endcan
                                            @can('000171')
                                                <li class="nav-item">
                                                    <a href="{{url('/empSettlement/admin')}}"
                                                       class="nav-link {{ Request::is('empSettlement/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Employee Settlement </a>
                                                </li>
                                            @endcan
                                            @can('000175')
                                                <li class="nav-item">
                                                    <a href="{{url('/empIncrement/admin')}}"
                                                       class="nav-link {{ Request::is('empIncrement/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Emp Increment </a>
                                                </li>
                                            @endcan
                                            @can('000179')
                                                <li class="nav-item">
                                                    <a href="{{url('/empPromotion/admin')}}"
                                                       class="nav-link {{ Request::is('empPromotion/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Emp Promotion </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endif


                            @if (Gate::any(['000185']))

                                @if(Request::is('empShiftAssign/*'))
                                    @php($shiftManagementNav = true)
                                @endif
                                <li class="nav-item">
                                    <a href="#shiftManagement"
                                       class="nav-link {{ isset($shiftManagementNav)?'active':'' }}"
                                       data-bs-toggle="collapse" role="button" aria-expanded="false"
                                       aria-controls="shiftManagement" data-key="t-calender">
                                        Shift Management
                                    </a>
                                    <div class="collapse menu-dropdown {{ isset($shiftManagementNav)?'show':'' }}"
                                         id="shiftManagement">
                                        <ul class="nav nav-sm flex-column">
                                            @can('000185')
                                                <li class="nav-item">
                                                    <a href="{{url('/empShiftAssign/admin')}}"
                                                       class="nav-link {{ Request::is('empShiftAssign/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Employee Shift Assign </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endif

                            @if (Gate::any(['000190','000194','000197','000210']))
                                @if(Request::is('holidaySetup/*')||
                                    Request::is('empAttendenceTimeCorrection/*')||
                                    Request::is('empAttendence/*')||
                                    Request::is('workingdaySetup/*'))
                                    @php($attendanceManagementNav = true)
                                @endif
                                <li class="nav-item">
                                    <a href="#attendanceManagement"
                                       class="nav-link {{ isset($attendanceManagementNav)?'active':'' }}"
                                       data-bs-toggle="collapse" role="button" aria-expanded="false"
                                       aria-controls="attendanceManagement" data-key="t-calender">
                                        Manage Attendance
                                    </a>
                                    <div class="collapse menu-dropdown {{ isset($attendanceManagementNav)?'show':'' }}"
                                         id="attendanceManagement">
                                        <ul class="nav nav-sm flex-column">
                                            @can('000231')
                                                <li class="nav-item">
                                                    <a href="{{url('/workingdaySetup/admin')}}"
                                                       class="nav-link {{ Request::is('workingdaySetup/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Working Days Setup </a>
                                                </li>
                                            @endcan
                                            @can('000190')
                                                <li class="nav-item">
                                                    <a href="{{url('/holidaySetup/admin')}}"
                                                       class="nav-link {{ Request::is('holidaySetup/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Holiday Setup </a>
                                                </li>
                                            @endcan
                                            @can('000194')
                                                <li class="nav-item">
                                                    <a href="{{url('/empAttendence/admin')}}"
                                                       class="nav-link {{ Request::is('empAttendence/admin') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Attendance (Manual) </a>
                                                </li>
                                            @endcan
                                            @can('000197')
                                                <li class="nav-item">
                                                    <a href="{{url('/empAttendenceTimeCorrection/admin')}}"
                                                       class="nav-link {{ Request::is('empAttendenceTimeCorrection/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Time Correction </a>
                                                </li>
                                            @endcan
                                            @can('000210')
                                                <li class="nav-item">
                                                    <a href="{{url('/empAttendence/fileEntry')}}"
                                                       class="nav-link {{ Request::is('empAttendence/fileEntry') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Attendance (File) </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endif

                            @if (Gate::any(['000215']))

                                @if(Request::is('movementRegister/*'))
                                    @php($movementRegisterNav = true)
                                @endif
                                <li class="nav-item">
                                    <a href="#movementRegister"
                                       class="nav-link {{ isset($movementRegisterNav)?'active':'' }}"
                                       data-bs-toggle="collapse" role="button" aria-expanded="false"
                                       aria-controls="movementRegister" data-key="t-calender">
                                        Movement Register
                                    </a>
                                    <div class="collapse menu-dropdown {{ isset($movementRegisterNav)?'show':'' }}"
                                         id="movementRegister">
                                        <ul class="nav nav-sm flex-column">
                                            @can('000215')
                                                <li class="nav-item">
                                                    <a href="{{url('/movementRegister/admin')}}"
                                                       class="nav-link {{ Request::is('movementRegister/*') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Manage </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endif

                            @if (Gate::any(['000235']))
                                @if(Request::is('humanResourceBudget/*'))
                                    @php($humanResourceBudgetNav = true)
                                @endif
                                <li class="nav-item">
                                    <a href="#humanResourceBudget"
                                       class="nav-link {{ isset($humanResourceBudgetNav)?'active':'' }}"
                                       data-bs-toggle="collapse" role="button" aria-expanded="false"
                                       aria-controls="humanResourceBudget" data-key="t-calender">
                                        Human Resource Budget
                                    </a>
                                    <div class="collapse menu-dropdown {{ isset($humanResourceBudgetNav)?'show':'' }}"
                                         id="humanResourceBudget">
                                        <ul class="nav nav-sm flex-column">
                                            @can('000235')
                                            <li class="nav-item">
                                                <a href="{{url('/humanResourceBudget/admin')}}"
                                                   class="nav-link {{ Request::is('humanResourceBudget/*') ? 'active' : '' }}"
                                                   data-key="t-main-calender"> Manage </a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </li>
                            @endif



                            @if (Gate::any(['000240','000241']))
                                @if(Request::is('hrm/employeeReport')||Request::is('hrm/salaryReport'))
                                    @php($reportNav = true)
                                @endif
                                <li class="nav-item">
                                    <a href="#report" class="nav-link {{ isset($reportNav)?'active':'' }}"
                                       data-bs-toggle="collapse" role="button" aria-expanded="false"
                                       aria-controls="report" data-key="t-calender">
                                        Report
                                    </a>
                                    <div class="collapse menu-dropdown {{ isset($reportNav)?'show':'' }}" id="report">
                                        <ul class="nav nav-sm flex-column">
                                            @can('000240')
                                                <li class="nav-item">
                                                    <a href="{{url('hrm/employeeReport')}}"
                                                       class="nav-link {{ Request::is('hrm/employeeReport') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Employee Report </a>
                                                </li>
                                            @endcan
                                            @can('000241')
                                                <li class="nav-item">
                                                    <a href="{{url('hrm/salaryReport')}}"
                                                       class="nav-link {{ Request::is('hrm/salaryReport') ? 'active' : '' }}"
                                                       data-key="t-main-calender"> Salary Report </a>
                                                </li>
                                            @endcan

                                        </ul>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>

                @endif
                <!-- HRM Nav Start -->

                {{-- logout menu --}}
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('lookup/admin')?'active':'' }}"
                       href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout fs-16 align-middle me-1"></i>
                        <span data-key="t-layouts">Logout ({{ Auth::user()->employee->full_name??Auth::user()->username}})</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                <!-- end Dashboard Menu -->
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
