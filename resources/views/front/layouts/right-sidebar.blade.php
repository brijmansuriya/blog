  <!--sidebar-->
  <div class="col-lg-4 oredoo-sidebar">
      <div class="theiaStickySidebar">
          <div class="sidebar">
              <!--search-->


              <!--categories-->
              <div class="widget ">
                  <div class="widget-title">
                      <h5>Categories</h5>
                  </div>
                  <div class="widget-categories">

                  @foreach($category as $cat)
                      <a class="category-item" href="{{route('categorypost',$cat->slug)}}">
                          <div class="">
                              <img style="width:100px;height: 100px;border-radius: 10px;" src="{{ $cat->image }}" alt="">
                          </div>
                          <p>{{ $cat->name }} </p>
                      </a>
                    @endforeach
                     
                  </div>
              </div>

              <!--newslatter-->


              <!--stay connected-->
              {{-- <div class="widget ">
                  <div class="widget-title">
                      <h5>Stay connected</h5>
                  </div>

                  <div class="widget-stay-connected">
                      <div class="list">
                          <div class="item color-facebook">
                              <a href="#"><i class="fab fa-facebook"></i></a>
                              <p>Facebook 12k</p>
                          </div>

                          <div class="item color-instagram">
                              <a href="#"><i class="fab fa-instagram"></i></a>
                              <p>instagram 102k</p>
                          </div>

                          <div class="item color-twitter">
                              <a href="#"><i class="fab fa-twitter"></i></a>
                              <p>twitter 22k</p>
                          </div>

                          <div class="item color-youtube">
                              <a href="#"><i class="fab fa-youtube"></i></a>
                              <p>Youtube 120k</p>
                          </div>

                          <div class="item color-dribbble">
                              <a href="#"><i class="fab fa-dribbble"></i></a>
                              <p>dribbble 17k</p>
                          </div>

                          <div class="item color-pinterest">
                              <a href="#"><i class="fab fa-pinterest"></i></a>
                              <p>pinterest 10k</p>
                          </div>
                      </div>
                  </div>
              </div> --}}


              <!--Tags-->
              <div class="widget">
                  <div class="widget-title">
                      <h5>Tags</h5>
                  </div>
                  <div class="tags">
                      <ul class="list-inline">
                      @foreach($tagsaaray as $tags)
                        <li >
                            <a href="{{route('tagpost',$tags)}}">{{$tags}}</a>
                        </li>
                      @endforeach
                      </ul>
                  </div>
              </div>

              <!--popular-posts-->
              {{-- <div class="widget">
                  <div class="widget-title">
                      <h5>popular Posts</h5>
                  </div>

                  <ul class="widget-popular-posts">
                      <!--post1-->
                      <li class="small-post">
                          <div class="small-post-image">
                              <a href="post-single.html">
                                  <img src="{{ asset('frontend/assets/img/blog/1.jpg') }}" alt="">
                                  <small class="nb">1</small>
                              </a>
                          </div>
                          <div class="small-post-content">
                              <p>
                                  <a href="post-single.html">Everything is designed. Few things are designed well.</a>
                              </p>
                              <small> <span class="slash"></span>3 mounth ago</small>
                          </div>
                      </li>
                      <!--post2-->
                      <li class="small-post">
                          <div class="small-post-image">
                              <a href="post-single.html">
                                  <img src="{{ asset('frontend/assets/img/blog/5.jpg') }}" alt="">
                                  <small class="nb">2</small>
                              </a>
                          </div>
                          <div class="small-post-content">
                              <p>
                                  <a href="post-single.html">Brand yourself for the career you want, not the job you </a>
                              </p>
                              <small> <span class="slash"></span>3 mounth ago</small>
                          </div>
                      </li>

                      <!--post3-->
                      <li class="small-post">
                          <div class="small-post-image">
                              <a href="post-single.html">
                                  <img src="{{ asset('frontend/assets/img/blog/13.jpg') }}" alt="">
                                  <small class="nb">3</small>
                              </a>
                          </div>
                          <div class="small-post-content">
                              <p>
                                  <a href="post-single.html">It’s easier to ask forgiveness than it is to get permission.</a>
                              </p>
                              <small> <span class="slash"></span> 3 mounth ago</small>
                          </div>
                      </li>

                      <!--post4-->
                      <li class="small-post">
                          <div class="small-post-image">
                              <a href="post-single.html">
                                  <img src="{{ asset('frontend/assets/img/blog/16.jpg') }}" alt="">
                                  <small class="nb">4</small>
                              </a>
                          </div>
                          <div class="small-post-content">
                              <p>
                                  <a href="post-single.html">All happiness depends on a leisurely breakfast</a>
                              </p>
                              <small> <span class="slash"></span>3 mounth ago</small>
                          </div>
                      </li>
                  </ul>
              </div> --}}

              <!--Ads-->
              <div class="widget">
                  <div class="widget-ads">
                      <img src="{{ asset('frontend/assets/img/ads/ads2.jpg') }}" alt="">
                  </div>
              </div>
          </div>
      </div>
  </div>
