<style type="text/css">
  .site-menu-item.active {
  	background: #323299;
  }
  .site-menubar-fold .mm-menu{
  	height: 100%;
  }
</style>
<div class="site-menubar">
	<ul class="site-menu">
		<li class="site-menu-item has-sub">
			<a href="<?php echo base_url('admin'); ?>">
				<i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
				<span class="site-menu-title">Dashboard</span>
			</a>
		</li>
		<li class="site-menu-item has-sub <?php if(isset($page) && $page=="Sub_Admin_list"){ echo 'active';} ?>">
			<a href="<?php echo base_url('admin/subadmin'); ?>">
				<i class="site-menu-icon icon wb-unlock" aria-hidden="true"></i>
				<span class="site-menu-title">Super Admin Controls</span>
			</a>
		</li>
		<li class="site-menu-item has-sub <?php if(isset($page) && $page=="student_summary"){ echo 'active';} ?>">
			<a href="<?php echo base_url('admin/student/summary'); ?>">
				<!-- <i class="site-menu-icon icon wb-list-numbered" aria-hidden="true"></i> -->
				<i class="site-menu-icon icon wb-indent-increase" aria-hidden="true" ></i>
				<span class="site-menu-title">Student Profile</span>
			</a>
		</li>
		<li class="site-menu-item has-sub <?php if(isset($page) && $page=="student_details"){ echo 'active';} ?>">
			<a href="javascript:void(0)">
				<!-- <i class="site-menu-icon wb-check-circle" aria-hidden="true"></i> -->
				<i class="site-menu-icon wb-file" aria-hidden="true"></i>
				<span class="site-menu-title">Student Details</span>
			</a>
		</li>
		<li class="site-menu-item has-sub <?php if(isset($page) && $page=="follow_up_update"){ echo 'active';} ?>">
			<a href="javascript:void(0)">
				<i class="site-menu-icon icon wb-star-half" aria-hidden="true" ></i>
				<!-- <i class="site-menu-icon icon wb-map" aria-hidden="true"></i> -->
				<span class="site-menu-title">Follow Up updates</span>
			</a>
		</li>
		<li class="site-menu-item has-sub <?php if(isset($section) && $section=='masterlist'){ echo 'active'; } ?>">
			<a href="javascript:void(0)">
				<!-- <i class="site-menu-icon wb-plugin" aria-hidden="true"></i> -->
				<i class="site-menu-icon icon wb-list-bulleted" aria-hidden="true"></i>
				<span class="site-menu-title">Master list</span>
				<span class="site-menu-arrow"></span>
			</a>
			<ul class="site-menu-sub">
				<li class="site-menu-item <?php if(isset($page) && $page=='ug_college'){ echo 'active';} ?>">
					<a href="<?php echo base_url('admin/colleges/UG/'); ?>">
						<span class="site-menu-title">UG Colleges</span>
					</a>
				</li>
				<li class="site-menu-item <?php if(isset($page) && $page=="ug_degree"){ echo 'active';} ?>">
					<a  href="<?php echo base_url('admin/degree/UG/'); ?>">
						<span class="site-menu-title">UG Degree</span>
					</a>
				</li>
				<li class="site-menu-item <?php if(isset($page) && $page=="pg_college"){ echo 'active';} ?>">
					<a href="<?php echo base_url('admin/colleges/PG/'); ?>">
						<span class="site-menu-title">PG Colleges</span>
					</a>
				</li>
				<li class="site-menu-item <?php if(isset($page) && $page=="pg_degree"){ echo 'active';} ?>">
					<a  href="<?php echo base_url('admin/degree/PG/'); ?>">
						<span class="site-menu-title">PG Degree</span>
					</a>
				</li>
				<li class="site-menu-item <?php if(isset($page) && $page=="Sources"){ echo 'active';} ?>">
					<a href="<?php echo base_url('admin/sources'); ?>">
						<span class="site-menu-title">Sources</span>
					</a>
				</li>
				<li class="site-menu-item <?php if(isset($page) && $page=="Packages"){ echo 'active';} ?>">
					<a href="<?php echo base_url('admin/packages'); ?>">
						<span class="site-menu-title">Packages</span>
					</a>
				</li>
				<li class="site-menu-item <?php if(isset($page) && $page=="Consultants"){ echo 'active';} ?>">
					<a href="<?php echo base_url('admin/consultants'); ?>">
						<span class="site-menu-title">Consultants</span>
					</a>
				</li>
				<li class="site-menu-item <?php if(isset($page) && $page=="Program"){ echo 'active';} ?>">
					<a href="<?php echo base_url('admin/programs'); ?>">
						<span class="site-menu-title">Programs</span>
					</a>
				</li>
				<li class="site-menu-item <?php if(isset($page) && $page=="Universities"){ echo 'active';} ?>">
					<a href="<?php echo base_url('admin/universities'); ?>">
						<span class="site-menu-title">Universities</span>
					</a>
				</li>
				<!-- <li class="site-menu-item <?php // if(isset($page) && $page=="student_details"){ echo 'active';} ?>">
					<a href="javascript:void(0)">
						<span class="site-menu-title">Applied programs</span>
					</a>
				</li> -->
				<li class="site-menu-item <?php if(isset($page) && $page=="application_rounds"){ echo 'active';} ?>">
					<a href="<?php echo base_url('admin/application_rounds'); ?>">
						<span class="site-menu-title">Application Rounds</span>
					</a>
				</li>
			</ul>
		</li>
		<li class="site-menu-item has-sub <?php if(isset($section) && $section=='report'){ echo 'active'; } ?>">
			<a href="javascript:void(0)">
				<!-- <i class="site-menu-icon wb-grid-4" aria-hidden="true"></i> -->
				<i class="site-menu-icon icon wb-clipboard" aria-hidden="true"></i>
				<span class="site-menu-title">Reports</span>
				<span class="site-menu-arrow"></span>
			</a>
			<ul class="site-menu-sub">
				<li class="site-menu-item <?php if(isset($page) && $page=="lead_report"){ echo 'active';} ?>">
					<a  href="<?php echo base_url('admin/reports/lead'); ?>">
						<span class="site-menu-title">Lead Report</span>
					</a>
				</li>
				<li class="site-menu-item <?php if(isset($page) && $page=="student_report"){ echo 'active';} ?>">
					<a  href="<?php echo base_url('admin/reports/student'); ?>">
						<span class="site-menu-title">Student Report</span>
					</a>
				</li>
				<li class="site-menu-item <?php if(isset($page) && $page=="success_report"){ echo 'active';} ?>">
					<a href="<?php echo base_url('admin/reports/success'); ?>">
						<span class="site-menu-title">Success Report</span>
					</a>
				</li>
			</ul>
		</li>
	</ul>
</div>