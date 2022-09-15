@extends('app.layouts.template')

@section('content')
<div class="col-12 mt-3">
    <div class="card calendar-cta">
        <div class="card-body">
            <div class="row">
                <div class="col-auto">
                    {{-- <img src="assets/images/widgets/calendar.svg" alt="" class="" height="150"> --}}
                    <img src="{{ asset('resources/templates3/view/assets/images/logo-sm.png') }}" alt="" class="" height="150">
                </div><!--end col-->
                <div class="col">
                    <h5 class="font-20">Welcome to your theme Calendar!</h5>
                    <p>Hi, You can see all your meetings, events and create new ones.</p>
                    <p>There are many variations of passages of Lorem Ipsum available, 
                        but the majority have suffered alteration in some form, by injected humour, 
                        or randomised words which don't look even slightly believable. 
                    </p>
                    <button type="button" class="btn btn-outline-primary">All Time chedule</button>
                </div><!--end col-->
                
            </div><!--end row-->
        </div><!--end card-body-->
    </div><!--end card-->
</div>
<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-3">
            <div class="card report-card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col">
                            <p class="text-dark mb-1 font-weight-semibold">Sessions</p>
                            <h3 class="my-2">24k</h3>
                            <p class="mb-0 text-truncate text-muted"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span> New Sessions Today</p>
                        </div>
                        <div class="col-auto align-self-center">
                            <div class="report-main-icon bg-light-alt">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-self-center text-muted icon-md"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>  
                            </div>
                        </div>
                    </div>
                </div><!--end card-body--> 
            </div><!--end card--> 
        </div> <!--end col--> 
        <div class="col-md-6 col-lg-3">
            <div class="card report-card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">                                                
                        <div class="col">
                            <p class="text-dark mb-1 font-weight-semibold">Avg.Sessions</p>
                            <h3 class="my-2">00:18</h3>
                            <p class="mb-0 text-truncate text-muted"><span class="text-success"><i class="mdi mdi-trending-up"></i>1.5%</span> Weekly Avg.Sessions</p>
                        </div>
                        <div class="col-auto align-self-center">
                            <div class="report-main-icon bg-light-alt">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock align-self-center text-muted icon-md"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>  
                            </div>
                        </div> 
                    </div>
                </div><!--end card-body--> 
            </div><!--end card--> 
        </div> <!--end col--> 
        <div class="col-md-6 col-lg-3">
            <div class="card report-card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">                                                
                        <div class="col">
                            <p class="text-dark mb-1 font-weight-semibold">Bounce Rate</p>
                            <h3 class="my-2">$2400</h3>
                            <p class="mb-0 text-truncate text-muted"><span class="text-danger"><i class="mdi mdi-trending-down"></i>35%</span> Bounce Rate Weekly</p>
                        </div>
                        <div class="col-auto align-self-center">
                            <div class="report-main-icon bg-light-alt">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity align-self-center text-muted icon-md"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>  
                            </div>
                        </div> 
                    </div>
                </div><!--end card-body--> 
            </div><!--end card--> 
        </div> <!--end col--> 
        <div class="col-md-6 col-lg-3">
            <div class="card report-card">
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col">  
                            <p class="text-dark mb-1 font-weight-semibold">Goal Completions</p>                                         
                            <h3 class="my-2">85000</h3>
                            <p class="mb-0 text-truncate text-muted"><span class="text-success"><i class="mdi mdi-trending-up"></i>10.5%</span> Completions Weekly</p>
                        </div>
                        <div class="col-auto align-self-center">
                            <div class="report-main-icon bg-light-alt">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase align-self-center text-muted icon-md"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>  
                            </div>
                        </div> 
                    </div>
                </div><!--end card-body--> 
            </div><!--end card--> 
        </div> <!--end col-->                               
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">                      
                    <h4 class="card-title">Browser Used &amp; Traffic Reports</h4>                      
                </div><!--end col-->
                <div class="col-auto"> 
                    <ul class="nav nav-pills-custom nav-pills mb-0" id="pills-tab" role="tablist">
                        <li class="nav-item mr-1">
                          <a class="nav-link" id="pills-traffic-tab" data-toggle="pill" href="#Traffic_Sources" role="tab" aria-controls="pills-traffic" aria-selected="false">Traffic Sources</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" id="pills-browser-tab" data-toggle="pill" href="#Browser_Used" role="tab" aria-controls="pills-browser" aria-selected="true">Browser Used</a>
                        </li>
                    </ul>
                </div><!--end col-->
            </div>  <!--end row-->                                  
        </div><!--end card-header-->
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade" id="Traffic_Sources" role="tabpanel" aria-labelledby="pills-traffic-tab">
                    <div class="table-responsive browser_users">
                        <table class="table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-top-0">Channel</th>
                                    <th class="border-top-0">Sessions</th>
                                    <th class="border-top-0">Prev.Period</th>
                                    <th class="border-top-0">% Change</th>
                                </tr><!--end tr-->
                            </thead>
                            <tbody>
                                <tr>                                                        
                                    <td><a href="" class="text-primary">Organic search</a></td>
                                    <td>10853<small class="text-muted">(52%)</small></td>
                                    <td>566<small class="text-muted">(92%)</small></td>
                                    <td> 52.80% <i class="fas fa-caret-up text-success font-16"></i></td>
                                </tr><!--end tr-->     
                                <tr>                                                        
                                    <td><a href="" class="text-primary">Direct</a></td>
                                    <td>2545<small class="text-muted">(47%)</small></td>
                                    <td>498<small class="text-muted">(81%)</small></td>
                                    <td> -17.20% <i class="fas fa-caret-down text-danger font-16"></i></td>
                                    
                                </tr><!--end tr-->    
                                <tr>                                                        
                                    <td><a href="" class="text-primary">Referal</a></td>
                                    <td>1836<small class="text-muted">(38%)</small></td> 
                                    <td>455<small class="text-muted">(74%)</small></td>
                                    <td> 41.12% <i class="fas fa-caret-up text-success font-16"></i></td>
                                    
                                </tr><!--end tr-->    
                                <tr>                                                        
                                    <td><a href="" class="text-primary">Email</a></td>
                                    <td>1958<small class="text-muted">(31%)</small></td> 
                                    <td>361<small class="text-muted">(61%)</small></td>
                                    <td> -8.24% <i class="fas fa-caret-down text-danger font-16"></i></td>
                                </tr><!--end tr-->    
                                <tr>                                                        
                                    <td><a href="" class="text-primary">Social</a></td>
                                    <td>1566<small class="text-muted">(26%)</small></td> 
                                    <td>299<small class="text-muted">(49%)</small></td>
                                    <td> 29.33% <i class="fas fa-caret-up text-success"></i></td>
                                </tr><!--end tr-->                            
                            </tbody>
                        </table> <!--end table-->                                               
                    </div><!--end /div-->
                </div>
                <div class="tab-pane fade active show" id="Browser_Used" role="tabpanel" aria-labelledby="pills-browser-tab">
                    <div class="table-responsive browser_users">
                        <table class="table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-top-0">Browser</th>
                                    <th class="border-top-0">Sessions</th>
                                    <th class="border-top-0">Bounce Rate</th>
                                    <th class="border-top-0">Transactions</th>
                                </tr><!--end tr-->
                            </thead>
                            <tbody>
                                <tr>                                                        
                                    <td><img src="assets/images/browser_logo/chrome.png" alt="" height="24" class="mr-2">Chrome</td>
                                    <td>10853<small class="text-muted">(52%)</small></td>                                   
                                    <td> 52.80%</td>
                                    <td>566<small class="text-muted">(92%)</small></td>
                                </tr><!--end tr-->     
                                <tr>                                                        
                                    <td><img src="assets/images/browser_logo/micro-edge.png" alt="" height="24" class="mr-2">Microsoft Edge</td>
                                    <td>2545<small class="text-muted">(47%)</small></td>                                   
                                    <td> 47.54%</td>
                                    <td>498<small class="text-muted">(81%)</small></td>
                                </tr><!--end tr-->    
                                <tr>                                                        
                                    <td><img src="assets/images/browser_logo/in-explorer.png" alt="" height="24" class="mr-2">Internet-Explorer</td>
                                    <td>1836<small class="text-muted">(38%)</small></td>                                   
                                    <td> 41.12%</td>
                                    <td>455<small class="text-muted">(74%)</small></td>
                                </tr><!--end tr-->    
                                <tr>                                                        
                                    <td><img src="assets/images/browser_logo/opera.png" alt="" height="24" class="mr-2">Opera</td>
                                    <td>1958<small class="text-muted">(31%)</small></td>                                   
                                    <td> 36.82%</td>
                                    <td>361<small class="text-muted">(61%)</small></td>
                                </tr><!--end tr-->    
                                                              
                            </tbody>
                        </table> <!--end table-->                                               
                    </div><!--end /div-->                                            
                </div>
            </div>
        </div><!--end card-body--> 
    </div><!--end card--> 
</div>



@endsection
