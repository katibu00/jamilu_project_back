@extends('layouts.app')
@section('pageTitle','Home')
@section('content')

	
			<!-- ============================ Hero Banner  Start================================== -->
			<div class="hero_banner image-cover image_bottom" style="background:#e1f0eb url(/assets/img/banner-1.png) no-repeat;">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-9 col-md-10 col-sm-12">
							<div class="simple-search-wrap">
								<div class="hero_search-2 text-center">
									<div class="elsio_tag">LISTEN TO OUR NEW ANTHEM</div>
									<h1 class="banner_title mb-4">Crack UPSC CSE - GS with World's largest learning platform</h1>
									<p class="font-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
									<div class="input-group simple_search">
										<i class="fa fa-search ico"></i>
										<input type="text" class="form-control" placeholder="Search Your Cources">
										<div class="input-group-append">
											<button class="btn theme-bg" type="button">Search</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Hero Banner End ================================== -->
			
			<!-- ============================ Our Awards Start ================================== -->
			<section class="p-0">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="crp_box ovr_top">
								<div class="row align-items-center m-0">
									<div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
										<div class="crp_tags"><h6>Over 700+ Cources in one place</h6></div>
									</div>
									<div class="col-xl-10 col-lg-9 col-md-8 col-sm-12">
										<div class="part_rcp">
											<ul>
												<li><div class="crp_img"><img src="/assets/img/lg-1.png" class="img-fluid" alt="" /></div></li>
												<li><div class="crp_img"><img src="/assets/img/lg-5.png" class="img-fluid" alt="" /></div></li>
												<li><div class="crp_img"><img src="/assets/img/lg-6.png" class="img-fluid" alt="" /></div></li>
												<li><div class="crp_img"><img src="/assets/img/lg-7.png" class="img-fluid" alt="" /></div></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Our Awards End ================================== -->
			
			<!-- ============================ Latest Cources Start ================================== -->
			<section>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8">
							<div class="sec-heading center">
								<h2>explore Featured <span class="theme-cl">Cources</span></h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center">
					
						<!-- Single Grid -->
						{{-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="crs_grid">
								<div class="crs_grid_thumb">
									<a href="course-detail.html" class="crs_detail_link">
										<img src="/assets/img/cr-1.jpg" class="img-fluid rounded" alt="" />
									</a>
									<div class="crs_video_ico">
										<i class="fa fa-play"></i>
									</div>
									<div class="crs_locked_ico">
										<i class="fa fa-lock"></i>
									</div>
								</div>
								<div class="crs_grid_caption">
									<div class="crs_flex">
										<div class="crs_fl_first">
											<div class="crs_cates cl_8"><span>Design</span></div>
										</div>
										<div class="crs_fl_last">
											<div class="crs_inrolled"><strong>8,350</strong>Enrolled</div>
										</div>
									</div>
									<div class="crs_title"><h4><a href="course-detail.html" class="crs_title_link">UI/UX Design pattern for succesfull software Applications</a></h4></div>
									<div class="crs_info_detail">
										<ul>
											<li><i class="fa fa-clock text-danger"></i><span>10 hr 07 min</span></li>
											<li><i class="fa fa-video text-success"></i><span>67 Lectures</span></li>
											<li><i class="fa fa-signal text-warning"></i><span>Beginer</span></li>
										</ul>
									</div>
								</div>
								<div class="crs_grid_foot">
									<div class="crs_flex">
										<div class="crs_fl_first">
											<div class="crs_tutor">
												<div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="/assets/img/user-6.jpg" class="img-fluid circle" alt="" /></a></div><div class="crs_tutor_name"><a href="instructor-detail.html">Robert Fox</a></div>
											</div>
										</div>
										<div class="crs_fl_last">
											<div class="crs_price"><h2><span class="currency">$</span><span class="theme-cl">149</span></h2></div>
										</div>
									</div>
								</div>
							</div>
						</div> --}}


						<!-- Row for Courses -->

    @foreach($courses as $course)
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="crs_grid">
                <div class="crs_grid_thumb">
                    <a href="{{ route('course.detail', ['slug' => $course->slug]) }}" class="crs_detail_link">
                        <img src="{{ $course->thumbnail ? asset($course->thumbnail) : '/assets/img/default-thumbnail.jpg' }}" class="img-fluid rounded" alt="{{ $course->title }}" />
                    </a>
                    <div class="crs_video_ico">
                        <i class="fa fa-play"></i>
                    </div>
                    @if($course->is_free)
                        <div class="crs_locked_ico">
                            <i class="fa fa-unlock"></i>
                        </div>
                    @else
                        <div class="crs_locked_ico">
                            <i class="fa fa-lock"></i>
                        </div>
                    @endif
                </div>
                <div class="crs_grid_caption">
                    <div class="crs_flex">
                        <div class="crs_fl_first">
                            <div class="crs_cates cl_{{ $course->category_id }}"><span>kk</span></div>
                        </div>
                        <div class="crs_fl_last">
                            <div class="crs_inrolled"><strong>{{ $course->enrollments }} Enrolled</strong></div>
                        </div>
                    </div>
                    <div class="crs_title"><h4><a href="{{ route('course.detail', ['slug' => $course->slug]) }}" class="crs_title_link">{{ $course->title }}</a></h4></div>
                    <div class="crs_info_detail">
                        <ul>
                            <li><i class="fa fa-clock text-danger"></i><span>{{ $course->duration }} hr</span></li>
                            <li><i class="fa fa-video text-success"></i><span>{{ $course->lectures }} Lectures</span></li>
                            <li><i class="fa fa-signal text-warning"></i><span>{{ $course->level }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="crs_grid_foot">
                    <div class="crs_flex">
                        <div class="crs_fl_first">
                            <div class="crs_tutor">
                                <div class="crs_tutor_thumb"><a href="{{ route('instructor.detail', ['id' => $course->instructor->id]) }}"><img src="{{ $course->instructor->profile_picture ? asset($course->instructor->profile_picture) : '/assets/img/default-profile.jpg' }}" class="img-fluid circle" alt="{{ $course->instructor->name }}" /></a></div><div class="crs_tutor_name"><a href="{{ route('instructor.detail', ['id' => $course->instructor->id]) }}">{{ $course->instructor->name }}</a></div>
                            </div>
                        </div>
                        <div class="crs_fl_last">
                            <div class="crs_price"><h2><span class="currency">$</span><span class="theme-cl">{{ $course->discount_price ?? $course->price }}</span></h2></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


						
						
					</div>
					
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8 mt-2">
							<div class="text-center"><a href="grid-layout-with-sidebar.html" class="btn btn-md theme-bg-light theme-cl">Explore More Cources</a></div>
						</div>
					</div>
					
				</div>
			</section>
			<!-- ============================ Latest Cources End ================================== -->
			




  <style>
    /* Custom CSS for career cards */
    .career-card {
      border: 1px solid #dee2e6;
      border-radius: 5px;
      cursor: pointer;
    }
    .career-card:hover {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .career-card .card-body {
      padding: 20px;
    }
  </style>


<section class="container py-5">
  <div class="row">
    <!-- Web Development Career Card -->
    <div class="col-lg-4 mb-4">
      <div class="career-card" data-toggle="collapse" data-target="#webDevInfo" aria-expanded="false">
        <div class="card-body">
          <h3 class="card-title">Web Development</h3>
          <p class="card-text">Become a Web Developer and build the future of the web.</p>
        </div>
      </div>
      <div id="webDevInfo" class="collapse">
        <div class="card-body">
          <h5>Overview:</h5>
          <p>Web development involves creating websites and web applications using programming languages such as HTML, CSS, and JavaScript.</p>
          <h5>Skills Required:</h5>
          <ul>
            <li>HTML</li>
            <li>CSS</li>
            <li>JavaScript</li>
            <!-- Add more skills as needed -->
          </ul>
          <h5>Salary Expectations:</h5>
          <p>Average salary: $60,000 - $100,000 per year</p>
          <!-- Add more details about the career -->
        </div>
      </div>
    </div>

    <!-- Digital Marketing Career Card -->
    <div class="col-lg-4 mb-4">
      <div class="career-card" data-toggle="collapse" data-target="#digitalMarketingInfo" aria-expanded="false">
        <div class="card-body">
          <h3 class="card-title">Digital Marketing</h3>
          <p class="card-text">Explore the world of digital marketing and reach your target audience online.</p>
        </div>
      </div>
      <div id="digitalMarketingInfo" class="collapse">
        <div class="card-body">
          <h5>Overview:</h5>
          <p>Digital marketing involves promoting products or services using digital channels such as social media, email, and search engines.</p>
          <h5>Skills Required:</h5>
          <ul>
            <li>Social media marketing</li>
            <li>Email marketing</li>
            <li>SEO</li>
            <!-- Add more skills as needed -->
          </ul>
          <h5>Salary Expectations:</h5>
          <p>Average salary: $50,000 - $90,000 per year</p>
          <!-- Add more details about the career -->
        </div>
      </div>
    </div>

    <!-- Data Analysis using Excel Career Card -->
    <div class="col-lg-4 mb-4">
      <div class="career-card" data-toggle="collapse" data-target="#dataAnalysisInfo" aria-expanded="false">
        <div class="card-body">
          <h3 class="card-title">Data Analysis using Excel</h3>
          <p class="card-text">Learn how to analyze data effectively using Microsoft Excel.</p>
        </div>
      </div>
      <div id="dataAnalysisInfo" class="collapse">
        <div class="card-body">
          <h5>Overview:</h5>
          <p>Data analysis using Excel involves extracting insights from data sets using various Excel functions and tools.</p>
          <h5>Skills Required:</h5>
          <ul>
            <li>Data visualization</li>
            <li>Pivot tables</li>
            <li>Formulas and functions</li>
            <!-- Add more skills as needed -->
          </ul>
          <h5>Salary Expectations:</h5>
          <p>Average salary: $50,000 - $80,000 per year</p>
          <!-- Add more details about the career -->
        </div>
      </div>
    </div>
  </div>
</section>









			<!-- ============================ Featured Categories Start ================================== -->
			<section class="min gray">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8">
							<div class="sec-heading center">
								<h2>Explore Featured <span class="theme-cl">Categories</span></h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
					</div>
					
					
					<div class="row justify-content-center">
						<!-- Single Category -->
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
							<div class="crs_cate_wrap style_2">
								<a href="grid-layout-with-sidebar.html" class="crs_cate_box">
									<div class="crs_cate_icon"><i class="fa fa-code"></i></div>
									<div class="crs_cate_caption"><span>Development</span></div>
									<div class="crs_cate_count"><span>22 Lectures</span></div>
								</a>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
							<div class="crs_cate_wrap style_2">
								<a href="grid-layout-with-sidebar.html" class="crs_cate_box">
									<div class="crs_cate_icon"><i class="fa fa-window-restore"></i></div>
									<div class="crs_cate_caption"><span>Web Designing</span></div>
									<div class="crs_cate_count"><span>22 Lectures</span></div>
								</a>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
							<div class="crs_cate_wrap style_2">
								<a href="grid-layout-with-sidebar.html" class="crs_cate_box">
									<div class="crs_cate_icon"><i class="fa fa-leaf"></i></div>
									<div class="crs_cate_caption"><span>Lifestyle</span></div>
									<div class="crs_cate_count"><span>22 Lectures</span></div>
								</a>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
							<div class="crs_cate_wrap style_2">
								<a href="grid-layout-with-sidebar.html" class="crs_cate_box">
									<div class="crs_cate_icon"><i class="fa fa-heartbeat"></i></div>
									<div class="crs_cate_caption"><span>Health & Fitness</span></div>
									<div class="crs_cate_count"><span>22 Lectures</span></div>
								</a>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
							<div class="crs_cate_wrap style_2">
								<a href="grid-layout-with-sidebar.html" class="crs_cate_box">
									<div class="crs_cate_icon"><i class="fa fa-landmark"></i></div>
									<div class="crs_cate_caption"><span>Gov. Exams</span></div>
									<div class="crs_cate_count"><span>22 Lectures</span></div>
								</a>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
							<div class="crs_cate_wrap style_2">
								<a href="grid-layout-with-sidebar.html" class="crs_cate_box">
									<div class="crs_cate_icon"><i class="fa fa-photo-video"></i></div>
									<div class="crs_cate_caption"><span>Photography</span></div>
									<div class="crs_cate_count"><span>22 Lectures</span></div>
								</a>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
							<div class="crs_cate_wrap style_2">
								<a href="grid-layout-with-sidebar.html" class="crs_cate_box">
									<div class="crs_cate_icon"><i class="fa fa-stamp"></i></div>
									<div class="crs_cate_caption"><span>Finance & Accounting</span></div>
									<div class="crs_cate_count"><span>22 Lectures</span></div>
								</a>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
							<div class="crs_cate_wrap style_2">
								<a href="grid-layout-with-sidebar.html" class="crs_cate_box">
									<div class="crs_cate_icon"><i class="fa fa-school"></i></div>
									<div class="crs_cate_caption"><span>Office Productivity</span></div>
									<div class="crs_cate_count"><span>22 Lectures</span></div>
								</a>
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ============================ Featured Categories End ================================== -->
			
			<!-- ============================ Work Process Start ================================== -->
			<section>
				<div class="container">
					
					<div class="row align-items-center justify-content-between mb-5">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<div class="lmp_caption">
								<h2 class="mb-3">We Have The Best Instructors Available in The City</h2>
								<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique</p>
								<div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
									<div class="d-flex align-items-center">
									  <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
										<i class="fas fa-check"></i>
									  </div>
									  <h6 class="mb-0 ml-3">Full lifetime access</h6>
									</div>
								</div>
								<div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
									<div class="d-flex align-items-center">
									  <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
										<i class="fas fa-check"></i>
									  </div>
									  <h6 class="mb-0 ml-3">20+ downloadable resources</h6>
									</div>
								</div>
								<div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
									<div class="d-flex align-items-center">
									  <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
										<i class="fas fa-check"></i>
									  </div>
									  <h6 class="mb-0 ml-3">Certificate of completion</h6>
									</div>
								</div>
								<div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
									<div class="d-flex align-items-center">
									  <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
										<i class="fas fa-check"></i>
									  </div>
									  <h6 class="mb-0 ml-3">Free Trial 7 Days</h6>
									</div>
								</div>
								<div class="text-left mt-4"><a href="#" class="btn btn-md text-light theme-bg">Enrolled Today</a></div>
							</div>
						</div>
						
						<div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
							<div class="lmp_thumb">
								<img src="/assets/img/lmp-2.png" class="img-fluid" alt="" />
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<section class="pt-0">
				<div class="container">				
					<div class="row align-items-center justify-content-between">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
							<div class="lmp_thumb">
								<img src="/assets/img/lmp-1.png" class="img-fluid" alt="" />
							</div>
						</div>
						<div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
							<div class="lmp_caption">
								<ol class="list-unstyled p-0">
								  <li class="d-flex align-items-start my-3 my-md-4">
									<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
									  <div class="position-absolute text-white h5 mb-0">1</div>
									</div>
									<div class="ml-3 ml-md-4">
									  <h4>Create account</h4>
									  <p>
										Oluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.
									  </p>
									</div>
								  </li>
								  <li class="d-flex align-items-start my-3 my-md-4">
									<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
									  <div class="position-absolute text-white h5 mb-0">3</div>
									</div>
									<div class="ml-3 ml-md-4">
									  <h4>Join Membership</h4>
									  <p>
										Error sit voluptatem actium doloremque laudantium, totam rem aperiam, eaque ipsa.
									  </p>
									</div>
								  </li>
								   <li class="d-flex align-items-start my-3 my-md-4">
									<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
									  <div class="position-absolute text-white h5 mb-0">3</div>
									</div>
									<div class="ml-3 ml-md-4">
									  <h4>Start Learning</h4>
									  <p>
										Error sit voluptatem actium doloremque laudantium, totam rem aperiam, eaque ipsa.
									  </p>
									</div>
								  </li>
								  <li class="d-flex align-items-start my-3 my-md-4">
									<div class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
									  <div class="position-absolute text-white h5 mb-0">4</div>
									</div>
									<div class="ml-3 ml-md-4">
									  <h4>Get Certificate</h4>
									  <p>
										Unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.
									  </p>
									</div>
								  </li>
								</ol>
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ============================ Work Process End ================================== -->
			
			<!-- ============================ Students Reviews ================================== -->
			<section class="gray">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8">
							<div class="sec-heading center">
								<h2>Our Students <span class="theme-cl">Reviews</span></h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-sm-12">
							
							<div class="reviews-slide space">
								
								<!-- Single Item -->
								<div class="single_items lios_item">
									<div class="_testimonial_wrios shadow_none">
										<div class="_testimonial_flex">
											<div class="_testimonial_flex_first">
												<div class="_tsl_flex_thumb">
													<img src="/assets/img/user-1.jpg" class="img-fluid" alt="">
												</div>
												<div class="_tsl_flex_capst">
													<h5>Susan D. Murphy</h5>
													<div class="_ovr_posts"><span>CEO, Leader</span></div>
													<div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
												</div>
											</div>
											<div class="_testimonial_flex_first_last">
												<div class="_tsl_flex_thumb">
													<img src="/assets/img/c-1.png" class="img-fluid" alt="">
												</div>
											</div>
										</div>
										
										<div class="facts-detail">
											<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="single_items lios_item">
									<div class="_testimonial_wrios shadow_none">
										<div class="_testimonial_flex">
											<div class="_testimonial_flex_first">
												<div class="_tsl_flex_thumb">
													<img src="/assets/img/user-2.jpg" class="img-fluid" alt="">
												</div>
												<div class="_tsl_flex_capst">
													<h5>Maxine E. Gagliardi</h5>
													<div class="_ovr_posts"><span>Apple CEO</span></div>
													<div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.5</div>
												</div>
											</div>
											<div class="_testimonial_flex_first_last">
												<div class="_tsl_flex_thumb">
													<img src="/assets/img/c-2.png" class="img-fluid" alt="">
												</div>
											</div>
										</div>
										
										<div class="facts-detail">
											<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="single_items lios_item">
									<div class="_testimonial_wrios shadow_none">
										<div class="_testimonial_flex">
											<div class="_testimonial_flex_first">
												<div class="_tsl_flex_thumb">
													<img src="/assets/img/user-3.jpg" class="img-fluid" alt="">
												</div>
												<div class="_tsl_flex_capst">
													<h5>Roy M. Cardona</h5>
													<div class="_ovr_posts"><span>Google Founder</span></div>
													<div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.9</div>
												</div>
											</div>
											<div class="_testimonial_flex_first_last">
												<div class="_tsl_flex_thumb">
													<img src="/assets/img/c-3.png" class="img-fluid" alt="">
												</div>
											</div>
										</div>
										
										<div class="facts-detail">
											<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="single_items lios_item">
									<div class="_testimonial_wrios shadow_none">
										<div class="_testimonial_flex">
											<div class="_testimonial_flex_first">
												<div class="_tsl_flex_thumb">
													<img src="/assets/img/user-4.jpg" class="img-fluid" alt="">
												</div>
												<div class="_tsl_flex_capst">
													<h5>Dorothy K. Shipton</h5>
													<div class="_ovr_posts"><span>Linkedin Leader</span></div>
													<div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
												</div>
											</div>
											<div class="_testimonial_flex_first_last">
												<div class="_tsl_flex_thumb">
													<img src="/assets/img/c-4.png" class="img-fluid" alt="">
												</div>
											</div>
										</div>
										
										<div class="facts-detail">
											<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="single_items lios_item">
									<div class="_testimonial_wrios shadow_none">
										<div class="_testimonial_flex">
											<div class="_testimonial_flex_first">
												<div class="_tsl_flex_thumb">
													<img src="/assets/img/user-5.jpg" class="img-fluid" alt="">
												</div>
												<div class="_tsl_flex_capst">
													<h5>Robert P. McKissack</h5>
													<div class="_ovr_posts"><span>CEO, Leader</span></div>
													<div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
												</div>
											</div>
											<div class="_testimonial_flex_first_last">
												<div class="_tsl_flex_thumb">
													<img src="/assets/img/c-5.png" class="img-fluid" alt="">
												</div>
											</div>
										</div>
										
										<div class="facts-detail">
											<p>Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.</p>
										</div>
									</div>
								</div>
							
							</div>
						
						</div>
					</div>
					
				</div>
			</section>
			<!-- ============================ Students Reviews End ================================== -->

			<!-- ============================ article Start ================================== -->
			<section class="min">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8">
							<div class="sec-heading center">
								<h2>Latest News & <span class="theme-cl">Articles</span></h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center">
						
						<!-- Single Item -->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="blg_grid_box">
								<div class="blg_grid_thumb">
									<a href="blog-detail.html"><img src="/assets/img/b-1.png" class="img-fluid" alt="" /></a>
								</div>
								<div class="blg_grid_caption">
									<div class="blg_tag"><span>Marketing</span></div>
									<div class="blg_title"><h4><a href="blog-detail.html">How To Register & Enrolled on SkillUp Step by Step?</a></h4></div>
									<div class="blg_desc"><p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p></div>
								</div>
								<div class="crs_grid_foot">
									<div class="crs_flex">
										<div class="crs_fl_first">
											<div class="crs_tutor">
												<div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="/assets/img/team-5.jpg" class="img-fluid circle" alt="" /></a></div>
											</div>
										</div>
										<div class="crs_fl_last">
											<div class="foot_list_info">
												<ul>
													<li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">10k Views</div></li>
													<li><div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div><div class="elsio_tx">10 July 2021</div></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Single Item -->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="blg_grid_box">
								<div class="blg_grid_thumb">
									<a href="blog-detail.html"><img src="/assets/img/b-2.png" class="img-fluid" alt="" /></a>
								</div>
								<div class="blg_grid_caption">
									<div class="blg_tag"><span>Business</span></div>
									<div class="blg_title"><h4><a href="blog-detail.html">Let's Know How Skillup Work Fast and Secure?</a></h4></div>
									<div class="blg_desc"><p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p></div>
								</div>
								<div class="crs_grid_foot">
									<div class="crs_flex">
										<div class="crs_fl_first">
											<div class="crs_tutor">
												<div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="/assets/img/team-5.jpg" class="img-fluid circle" alt="" /></a></div>
											</div>
										</div>
										<div class="crs_fl_last">
											<div class="foot_list_info">
												<ul>
													<li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">10k Views</div></li>
													<li><div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div><div class="elsio_tx">10 July 2021</div></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Single Item -->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="blg_grid_box">
								<div class="blg_grid_thumb">
									<a href="blog-detail.html"><img src="/assets/img/b-3.png" class="img-fluid" alt="" /></a>
								</div>
								<div class="blg_grid_caption">
									<div class="blg_tag"><span>Accounting</span></div>
									<div class="blg_title"><h4><a href="blog-detail.html">How To Improove Digital Marketing for Fast SEO</a></h4></div>
									<div class="blg_desc"><p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p></div>
								</div>
								<div class="crs_grid_foot">
									<div class="crs_flex">
										<div class="crs_fl_first">
											<div class="crs_tutor">
												<div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="/assets/img/team-5.jpg" class="img-fluid circle" alt="" /></a></div>
											</div>
										</div>
										<div class="crs_fl_last">
											<div class="foot_list_info">
												<ul>
													<li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">10k Views</div></li>
													<li><div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div><div class="elsio_tx">10 July 2021</div></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- ============================ article End ================================== -->
			
			<!-- ============================ Call To Action ================================== -->
			<section class="theme-bg call_action_wrap-wrap">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							
							<div class="call_action_wrap">
								<div class="call_action_wrap-head">
									<h3>Do You Have Questions ?</h3>
									<span>We'll help you to grow your career and growth.</span>
								</div>
								<a href="#" class="btn btn-call_action_wrap">Contact Us Today</a>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Call To Action End ================================== -->
			@endsection