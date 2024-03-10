@extends('layouts.app')
<style>
    .error {
        background-color: #F44336;
        color: #FFFFFF;
        font-weight: bold;
        padding: 10px;
    }

    .warning {
        background-color: #E65100;
        color: #FFFFFF;
        font-weight: bold;
        padding: 10px;
    }
</style>
@section('content')

    <!-- Main Content -->
    <div class="main-content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- User Profile Image -->
                        <div class="user-profile-img">
                            <div class="cover-img">
                                <img src="{{asset('admin/img/media/fcp.jpg')}}" class="w-100" alt="">

                                <!-- Upload Photo -->
                                <div class="upload-button">
                                    <img src="{{asset('admin/img/svg/gallery.svg')}}" alt="" class="svg mr-2">
                                    {{--                                    <span>Upload Photo</span>
                                                                        <input class="file-input" type="file" id="fileUpload3" accept="image/*">--}}
                                </div>
                                <!-- End Upload Photo -->
                            </div>
                        </div>
                        <!-- End User Profile Image -->
                    </div>
                    <!-- Form -->
                    <form action="/user/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mx-2 mx-lg-4 mx-xl-5">
                            <div class="card mt-1">
                                <!-- User Profile Nav -->
                                <div class="user-profile-nav d-flex justify-content-xl-between align-items-xl-center flex-column flex-xl-row">
                                    <!-- Profile Info -->
                                    <div class="profile-info d-flex align-items-center">

                                        <div class="profile-pic mr-3">
                                            <img id="previewing"
                                                 src="{{asset('admin/img/media/profile-pic.jpg')}}"
                                                 width="225" height="250" class="svg mr-2"/></div>
                                        <div>

                                            <!-- Upload Photo -->
                                            <input class="file-input" name="image" type="file" id="file">
                                            <!-- End Upload Photo -->
                                            {{--                                            <input type="file" name="image">--}}
                                        </div>

                                        <div>
                                            <h3></h3>
                                            <p class="font-14"></p>
                                        </div>
                                    </div>
                                    <!-- End Profile Info -->

                                    <div class="d-flex align-items-center mt-3 mt-xl-0">
                                        <ul class="nav profile-nav-tabs">
                                            <li>
                                                <a class="active pr-0 pl-2 pl-xl-30">
                                                    <span class="chat">
                                                        <img src="{{asset('admin/img/svg/writing.svg')}}" alt=""
                                                             class="svg">
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="conncetion" href="connection.html">
                                                    <div class="btn-circle mr-20">
                                                        <img src="{{asset('admin/img/svg/writing.svg')}}" alt=""
                                                             class="svg">
                                                    </div>
                                                    <div class="font-14">
                                                        <h4>154</h4>
                                                        <p class="font-14 text_color">Instrument Taken</p>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>

                                </div>
                                <!-- End User Profile Nav -->
                            </div>

                            <div class="mt-30">

                                <div class="row">
                                    <div class="col-xl-6">
                                        <!-- Card -->
                                        <div class="card">
                                            <div class="card-body p-30">
                                                <!-- Edit Personal Info -->
                                                <div class="edit-personal-info mb-5">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h4 class="mb-3">Personal Information</h4>
                                                        </div>
                                                    </div>

                                                    <!-- Form Group -->
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-3">
                                                            <label for="edit-fname">First Name</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" name="fname" id="edit-fname"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->


                                                    <!-- Form Group -->
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-3">
                                                            <label for="edit-lname">Last Name</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" name="lname" id="edit-lname"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-3">
                                                            <label for="edit-age">Age</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" name="age" id="edit-age"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-3">
                                                            <label for="edit-position">Position</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" name="position" id="edit-position"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-3">
                                                            <label for="edit-address">Address</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" name="address" id="edit-address"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-3">
                                                            <label for="edit-phone">Phone</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="text" name="phone" id="edit-phone"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-3">
                                                            <label for="edit-email">Email</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <input type="email" name="email" id="edit-email"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <!-- Form Group -->
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-3">
                                                            <label for="edit-email">Role</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <select class="theme-input-style" name="role"
                                                                    id="exampleSelect1">
                                                                <option value="1">Admin</option>
                                                                <option value="0">User</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- Form Group -->

                                                </div>
                                                <!-- End Edit Personal Info -->
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                    </div>
                                    <div class="col-xl-6">
                                        <!-- Card -->
                                        <div class="card mb-30">
                                            <div class="card-body p-30">
                                                <div class="about-myself mb-5">
                                                    <h4 class="mb-3">About Myself</h4>
                                                    <textarea name="about"
                                                              class="theme-input-style style--two"></textarea>
                                                </div>
                                                <!-- Change Password -->
                                                <div class="change-password">
                                                    <div><h4 class="mb-4 pt-2">Change Password</h4></div>

                                                    <!-- Form Group -->
                                                    <div class="form-group mb-4">
                                                        <label for="new-pass"
                                                               class="bold font-14 mb-2 black">Password</label>
                                                        <input type="password" name="password" class="theme-input-style"
                                                               id="password" placeholder="********">
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group mb-10">
                                                        <label for="retype-pass" class="bold font-14 mb-2 black">Retype
                                                            Password</label>
                                                        <input type="password" name="confirm_password"
                                                               class="theme-input-style" id="confirm_password"
                                                               placeholder="********"><span id='message'></span>
                                                        <div id="message"></div>
                                                    </div>
                                                    <!-- End Form Group -->
                                                </div>
                                                <!-- End Change Password -->
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                    </div>

                                    <div class="col-12 text-right">
                                        <!-- Button Group -->
                                        <div class="button-group pt-1">
                                            <button type="reset" class="link-btn bg-transparent mr-3 soft-pink">Cancel
                                            </button>
                                            <button type="submit" class="btn">Save Changes</button>
                                        </div>
                                        <!-- End Button Group -->
                                    </div>
                                </div>
                                <!-- End Form -->
                            </div>
                        </div>

                    </form>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Work Experience</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete Work Experience?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn long" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn long">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteConfirmEducationModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel2"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel2">Delete School Experience</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete School Experience?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn long" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn long">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Main Content -->
            <script src="{{asset('admin/js/jquery.min.js')}}"></script>
            <script>
                $(function () {
                    $("#file").change(function () {
                        $("#message").empty(); // To remove the previous error message
                        var file = this.files[0];
                        var imagefile = file.type;
                        var match = ["image/jpeg", "image/png", "image/jpg"];

                        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                            $("#file").css("color", "red");
                            $('#previewing').attr('src', 'http://www.bazaardaily.co.uk/wp-content/uploads/2017/06/Logo-Menu.png');
                            $("#message").html("<p class='error'>Please select a valid image file, Only jpeg, jpg and png Images type allowed</p>");
                            return false;
                        } else {
                            var reader = new FileReader();
                            reader.onload = imageIsLoaded;
                            reader.readAsDataURL(this.files[0]);

                            // for validate image size
                            var limit = 2097152; //2MB ==> 1048576 bytes = 1MB;
                            if (this.files[0].size > limit) {
                                $("#message").html('<p class="warning">Image size is large, max size 2MB!</p>');
                                $("#file").css("color", "red");
                            }
                        }
                    });
                });

                function imageIsLoaded(e) {
                    $("#file").css("color", "green");
                    $('#image_preview').css("display", "block");
                    $('#previewing').attr('src', e.target.result);
                    $('#previewing').attr('width', '555px');
                    $('#previewing').attr('height', '277px');
                };
                $('#password, #confirm_password').on('keyup', function () {
                    if ($('#password').val() == $('#confirm_password').val()) {
                        $('#message').html('Password matched').css('color', 'green');
                    } else
                        $('#message').html('Password does not match').css('color', 'red');
                });
            </script>
@endsection