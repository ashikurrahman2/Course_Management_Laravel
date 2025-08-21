@extends('layouts.app')

@section('title', 'Course Leasson')

@section('content')
 <section class="course-lession bg-shade sec-padding overflow-hidden">
      <div class="container-fluid px-0">
         <div class="row">
            <div class="col-lg-4">
               <aside class="sidebar position-relative lession-sidebar px-4">
                  <h1 class="display-4 mb-4">Course Content</h1>
                  <div class="lesson-container">
                     <div class="accordion-2" id="accordion-course">
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="headingOne">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                 aria-expanded="true" aria-controls="collapseOne">
                                 Understanding UI and UX Design
                              </button>
                           </h2>
                           <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                              data-bs-parent="#accordion-course">
                              <div class="accordion-body">
                                 <div class="lesson-items">
                                    <ul class="list-unstyled">
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/video.png" alt="Video">
                                                Personal Development
                                             </span>
                                             <span>
                                                51.08
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/video.png" alt="Video">
                                                User Research
                                             </span>
                                             <span>
                                                3.32
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/video.png" alt="Video">
                                                Persona Development
                                             </span>
                                             <span>
                                                2.08
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="heading2">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2"
                                 aria-expanded="true" aria-controls="collapse2">
                                 Roles in UI/UX Design
                              </button>
                           </h2>
                           <div id="collapse2" class="accordion-collapse collapse " aria-labelledby="heading2"
                              data-bs-parent="#accordion-course">
                              <div class="accordion-body">
                                 <div class="lesson-items">
                                    <ul class="list-unstyled">
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/video.png" alt="Video">
                                                User Research
                                             </span>
                                             <span>
                                                3.08
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="images/icons/video.png" alt="Video">
                                                Persona Development
                                             </span>
                                             <span>
                                                3.08
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/video.png" alt="Video">
                                                Persona Development
                                             </span>
                                             <span>
                                                3.08
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="heading3">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3"
                                 aria-expanded="true" aria-controls="collapse3">
                                 Principles UI/UX Design
                              </button>
                           </h2>
                           <div id="collapse3" class="accordion-collapse collapse " aria-labelledby="heading3"
                              data-bs-parent="#accordion-course">
                              <div class="accordion-body">
                                 <div class="lesson-items">
                                    <ul class="list-unstyled">
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/video.png" alt="Video">
                                                User Research
                                             </span>
                                             <span>
                                                3.08
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/video.png" alt="Video">
                                                Persona Development
                                             </span>
                                             <span>
                                                3.08
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/video.png" alt="Video">
                                                Persona Development
                                             </span>
                                             <span>
                                                3.08
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="heading4">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4"
                                 aria-expanded="true" aria-controls="collapse4">
                                 User Research Techniques
                              </button>
                           </h2>
                           <div id="collapse4" class="accordion-collapse collapse " aria-labelledby="heading4"
                              data-bs-parent="#accordion-course">
                              <div class="accordion-body">
                                 <div class="lesson-items">
                                    <ul class="list-unstyled">
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/video.png" alt="Video">
                                                User Research
                                             </span>
                                             <span>
                                                3.08
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/video.png" alt="Video">
                                                Persona Development
                                             </span>
                                             <span>
                                                3.08
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/video.png" alt="Video">
                                                Persona Development
                                             </span>
                                             <span>
                                                3.08
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a>
                                        </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="heading5">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5"
                                 aria-expanded="true" aria-controls="collapse5">
                                 Creating User Personal
                              </button>
                           </h2>
                           <div id="collapse5" class="accordion-collapse collapse " aria-labelledby="heading5"
                              data-bs-parent="#accordion-course">
                              <div class="accordion-body">
                                 <div class="lesson-items">
                                    <ul class="list-unstyled">
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/video.png" alt="Video">
                                                User Research
                                             </span>
                                             <span>
                                                3.08
                                                <img src="images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="images/icons/video.png" alt="Video">
                                                Persona Development
                                             </span>
                                             <span>
                                                3.08
                                                <img src="images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="images/icons/video.png" alt="Video">
                                                Persona Development
                                             </span>
                                             <span>
                                                3.08
                                                <img src="images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="heading6">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6"
                                 aria-expanded="true" aria-controls="collapse6">
                                 User Research Techniques
                              </button>
                           </h2>
                           <div id="collapse6" class="accordion-collapse collapse " aria-labelledby="heading6"
                              data-bs-parent="#accordion-course">
                              <div class="accordion-body">
                                 <div class="lesson-items">
                                    <ul class="list-unstyled">
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="images/icons/video.png" alt="Video">
                                                User Research
                                             </span>
                                             <span>
                                                3.08
                                                <img src="images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="images/icons/video.png" alt="Video">
                                                Persona Development
                                             </span>
                                             <span>
                                                3.08
                                                <img src="images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="images/icons/video.png" alt="Video">
                                                Persona Development
                                             </span>
                                             <span>
                                                3.08
                                                <img src="images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div> <!-- Accordion Item End -->
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="heading7">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7"
                                 aria-expanded="true" aria-controls="collapse7">
                                 User Research Techniques
                              </button>
                           </h2>
                           <div id="collapse7" class="accordion-collapse collapse " aria-labelledby="heading7"
                              data-bs-parent="#accordion-course">
                              <div class="accordion-body">
                                 <div class="lesson-items">
                                    <ul class="list-unstyled">
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="{{ asset('/') }}frontend/assets/images/icons/video.png" alt="Video">
                                                User Research
                                             </span>
                                             <span>
                                                3.08
                                                <img src="images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="images/icons/video.png" alt="Video">
                                                Persona Development
                                             </span>
                                             <span>
                                                3.08
                                                <img src="images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="images/icons/video.png" alt="Video">
                                                Persona Development
                                             </span>
                                             <span>
                                                3.08
                                                <img src="images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div> <!-- Accordion Item End -->
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="heading8">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8"
                                 aria-expanded="true" aria-controls="collapse8">
                                Landing page Design
                              </button>
                           </h2>
                           <div id="collapse8" class="accordion-collapse collapse " aria-labelledby="heading8"
                              data-bs-parent="#accordion-course">
                              <div class="accordion-body">
                                 <div class="lesson-items">
                                    <ul class="list-unstyled">
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="images/icons/video.png" alt="Video">
                                                User Research
                                             </span>
                                             <span>
                                                3.08
                                                <img src="images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="images/icons/video.png" alt="Video">
                                                Persona Development
                                             </span>
                                             <span>
                                                3.08
                                                <img src="images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                       <li><a href="#" class="d-flex justify-content-between align-items-center">
                                             <span class="lesson-title">
                                                <img src="images/icons/video.png" alt="Video">
                                                Persona Development
                                             </span>
                                             <span>
                                                3.08
                                                <img src="images/icons/lock.png" alt="Lock">
                                             </span>
                                          </a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div> <!-- Accordion Item End -->
                     </div><!-- Accordion Wrap End -->
                  </div>
               </aside>
            </div>
            <div class="col-lg-8">
               <div class="lesstion-wrap">
                  <div class="lession-video">
                     <div class="plyr__video-embed" id="player">
                        <iframe
                           src="https://www.youtube.com/embed/bTqVqk7FSmY?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                           allowfullscreen allowtransparency allow="autoplay"></iframe>
                     </div>
                  </div>
                  <div class="lession-content bg-white p-5">
                     <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                           <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                              aria-controls="home" aria-selected="true">Overview</button>
                        </li>
                        <li class="nav-item" role="presentation">
                           <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab"
                              aria-controls="profile" aria-selected="false">Instructors</button>
                        </li>
                        <li class="nav-item" role="presentation">
                           <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab"
                              aria-controls="contact" aria-selected="false">Reviews</button>
                        </li>
                     </ul>
                     <div class="tab-content py-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                           <h3 class="display-5 mb-4">The modern JavaScript course for everyone! Master JavaScript with projects, challenges and theory. Many courses in one!</h3>
                           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint ea praesentium sit eum dolorum debitis iusto repellat, aliquam natus maxime facilis asperiores error exercitationem ab recusandae, laudantium nam nulla animi temporibus quo obcaecati ex cumque! Reiciendis optio cum repellat obcaecati odio fugit praesentium quam eveniet fugiat, quisquam impedit corporis! Quibusdam!</p>
                           <h5>What you'll learn throughout the course?</h5>

                           <ul>
                              <li>What does set and get do?</li>
                              <li>I dont understand his explanation</li>
                              <li>Function from an object instance</li>
                           </ul>
                           <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam, doloremque! Eligendi, tempore quisquam officiis porro deserunt debitis odio atque magnam! Necessitatibus vero facilis perspiciatis mollitia recusandae eaque ullam! Nesciunt, fugiat?</p>

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           <h3 class="display-4 mb-5">Instructor</h3>
                           <div class="author-card d-md-flex align-items-center border rounded-2 bg-shade p-3">
                              <div class="author-img">
                                 <img src="{{ asset('/') }}frontend/assets/{{ asset('/') }}frontend/assets/images/instructor-lg.jpg" alt="Instructor" class="img-fluid rounded-3">
                              </div>
                              <div class="author-text">
                                 <h4>Maria Rivera, M.A.</h4>
                                 <small class="text-mute">Arts Instructor</small>
                                 <p>This is a comprehensive outline, and the actual content and duration of each module
                                    may vary based on the course
                                    format
                                    and duration. Hands-on activities, case studies, and real-world projects should be
                                    integrated throughout the course
                                    to
                                    enhance practical skills.</p>
                                 <div class="social-share white mt-3">
                                    <a href="#"><i class="feather-icon icon-facebook"></i></a>
                                    <a href="#"><i class="feather-icon icon-twitter"></i></a>
                                    <a href="#"><i class="feather-icon icon-youtube"></i></a>
                                    <a href="#"><i class="feather-icon icon-linkedin"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                           
                           <div class="course-rate d-flex justify-content-between align-items-center mb-5 pb-5 border-bottom">
                              <div class="ratings-stat text-center shadow-sm p-4">
                                 <h3 class="display-1 mb-0">4.8</h3>
                                 <div class="ratings">
                                    <img src="{{ asset('/') }}frontend/assets/images/icons/star.png" alt="">
                                    <img src="{{ asset('/') }}frontend/assets/images/icons/star.png" alt="">
                                    <img src="{{ asset('/') }}frontend/assets/images/icons/star.png" alt="">
                                    <img src="{{ asset('/') }}frontend/assets/images/icons/star.png" alt="">
                                    <img src="{{ asset('/') }}frontend/assets/images/icons/star.png" alt="">
                                 </div>
                                 <div class="course-rate__summary-text">
                                    12 Ratings
                                 </div>
                              </div>
                              <div class="ratings-details">
                                 <div class="d-flex align-items-center">
                                    <span>5 <img src="images/icons/star.png" alt=""></span>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0"
                                       aria-valuemax="100">
                                       <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                 </div>
                                
                                 <div class="d-flex align-items-center">
                                    <span>4 <img src="{{ asset('/') }}frontend/assets/images/icons/star.png" alt=""></span>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0"
                                       aria-valuemax="100">
                                       <div class="progress-bar" style="width: 75%"></div>
                                    </div>
                                 </div>
                                 
                                 <div class="d-flex align-items-center">
                                    <span>3 <img src="images/icons/star.png" alt=""></span>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0"
                                       aria-valuemax="100">
                                       <div class="progress-bar" style="width: 50%"></div>
                                    </div>
                                 </div>
                                
                                 <div class="d-flex align-items-center">
                                    <span>2 <img src="{{ asset('/') }}frontend/assets/images/icons/star.png" alt=""></span>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0"
                                       aria-valuemax="100">
                                       <div class="progress-bar" style="width: 25%"></div>
                                    </div>
                                 </div>
                                 
                                 <div class="d-flex align-items-center">
                                    <span>1 <img src="{{ asset('/') }}frontend/assets/images/icons/star.png" alt=""></span>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0"
                                       aria-valuemax="100">
                                       <div class="progress-bar" style="width: 0%"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="post-comments">
                              <ol class="comment-list list-unstyled">
                                 <li>
                                    <article class="comment-entry">
                                       <div class="d-sm-flex align-items-top">
                                          <div class="comment-thumb">
                                             <img width="80" class="img-fluid rounded-circle" src="{{ asset('/') }}frontend/assets/images/avatar5.png" alt="Comments">
                                          </div>
                                          <div class="commentor ms-lg-4 bg-shade p-4 rounded-2">
                                             <div class="d-flex justify-content-between mb-3">
                                                <div class="comment-head">
                                                   <h4 class="display-5 mb-0">Johnathon Smith</h4>
                                                   <small class="text-muted">Nov 12, 2022 at 12:12 am</small>
                                                </div>
                                                <div class="ratings pt-2">
                                                   <img src="images/icons/star.png" alt="Star">
                                                   <img src="images/icons/star.png" alt="Star">
                                                   <img src="images/icons/star.png" alt="Star">
                                                   <img src="images/icons/star.png" alt="Star">
                                                   <img src="images/icons/star.png" alt="Star">
                                                </div>
                                             </div>
                                             <p>Mauris non dignissim purus, ac commodo diam. Donec sit amet lacinia
                                                nulla. Aliquam quis purus in justo pulvinar tempor.</p>
                                          </div>
                                       </div>
                                    </article>
                                    <ol class="children">
                                       <li>
                                          <article class="comment-entry">
                                             <div class="d-sm-flex align-items-top">
                                                <div class="comment-thumb">
                                                   <img width="80" class="img-fluid rounded-circle" src="images/avatar3.png" alt="Comments">
                                                </div>
                                                <div class="commentor ms-lg-4 bg-shade p-4 rounded-2">
                                                   <div class="d-flex justify-content-between mb-3">
                                                      <div class="comment-head">
                                                         <h4 class="display-5 mb-0">Andrew Dian</h4>
                                                         <small class="text-muted">Nov 12, 2022 at 12:12 am</small>
                                                      </div>
                                                      <div class="ratings pt-2">
                                                         <img src="images/icons/star.png" alt="Star">
                                                         <img src="images/icons/star.png" alt="Star">
                                                         <img src="images/icons/star.png" alt="Star">
                                                         <img src="images/icons/star.png" alt="Star">
                                                         <img src="images/icons/star-half.png" alt="Star">
                                                      </div>
                                                   </div>
                                                   <p>Mauris non dignissim purus, ac commodo diam. Donec sit amet
                                                      lacinia nulla. Aliquam quis purus in justo
                                                      pulvinar tempor.</p>
                                                </div>
                                             </div>
                                          </article>
                                       </li>
                                    </ol>
                                 </li>
                                 <li>
                                    <article class="comment-entry">
                                       <div class="d-sm-flex align-items-top">
                                          <div class="comment-thumb">
                                             <img width="80" class="img-fluid rounded-circle" src="images/avatar4.png" alt="Comments">
                                          </div>
                                          <div class="commentor ms-lg-4 bg-shade p-4 rounded-2">
                                             <div class="d-flex justify-content-between mb-3">
                                                <div class="comment-head">
                                                   <h4 class="display-5 mb-0">Mc Donald</h4>
                                                   <small class="text-muted">Nov 12, 2022 at 12:12 am</small>
                                                </div>
                                                <div class="ratings pt-2">
                                                   <img src="images/icons/star.png" alt="Star">
                                                   <img src="images/icons/star.png" alt="Star">
                                                   <img src="images/icons/star.png" alt="Star">
                                                   <img src="images/icons/star.png" alt="Star">
                                                   <img src="images/icons/star-half.png" alt="Star">
                                                </div>
                                             </div>
                                             <p>Mauris non dignissim purus, ac commodo diam. Donec sit amet lacinia
                                                nulla. Aliquam quis purus in justo
                                                pulvinar tempor.</p>
                                          </div>
                                       </div>
                                    </article>
                                 </li>
                              </ol>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
@endsection