<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Atomic Theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="header__main" id="menu">
		<div>
			<a href="<?php echo get_home_url(); ?>" class="header__logo">
				<svg width="176" height="57" viewBox="0 0 176 57" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M24.5369 7.84229C19.951 7.84229 16.2334 11.5599 16.2334 16.1458C16.2334 20.7316 19.951 24.4492 24.5369 24.4492C29.1227 24.4492 32.8403 20.7316 32.8403 16.1458C32.8403 11.5599 29.1227 7.84229 24.5369 7.84229ZM13.6758 16.1458C13.6758 10.1473 18.5385 5.28467 24.5369 5.28467C30.5353 5.28467 35.398 10.1473 35.398 16.1458C35.398 22.1442 30.5353 27.0068 24.5369 27.0068C18.5385 27.0068 13.6758 22.1442 13.6758 16.1458Z" fill="#004589"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M59.883 3.48438C53.8323 3.48438 48.9268 8.38994 48.9268 14.4406C48.9268 20.4912 53.8323 25.3968 59.883 25.3968C65.9336 25.3968 70.8392 20.4912 70.8392 14.4406C70.8392 8.38994 65.9336 3.48438 59.883 3.48438ZM46.3691 14.4406C46.3691 6.9774 52.4198 0.926758 59.883 0.926758C67.3462 0.926758 73.3968 6.9774 73.3968 14.4406C73.3968 21.9038 67.3462 27.9544 59.883 27.9544C52.4198 27.9544 46.3691 21.9038 46.3691 14.4406Z" fill="#007E59"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M59.8787 37.7622C55.2935 37.7622 51.5752 41.4806 51.5752 46.0657C51.5752 50.6508 55.2935 54.3691 59.8787 54.3691C64.4638 54.3691 68.1821 50.6508 68.1821 46.0657C68.1821 41.4806 64.4638 37.7622 59.8787 37.7622ZM49.0176 46.0657C49.0176 40.068 53.881 35.2046 59.8787 35.2046C65.8763 35.2046 70.7398 40.068 70.7398 46.0657C70.7398 52.0633 65.8763 56.9268 59.8787 56.9268C53.881 56.9268 49.0176 52.0633 49.0176 46.0657Z" fill="#00667C"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M16.2335 21.4761C8.68052 21.4761 2.55762 27.599 2.55762 35.152C2.55762 42.7049 8.68052 48.8278 16.2335 48.8278C23.7865 48.8278 29.9094 42.7049 29.9094 35.152C29.9094 27.599 23.7865 21.4761 16.2335 21.4761ZM0 35.152C0 26.1864 7.26799 18.9185 16.2335 18.9185C25.199 18.9185 32.467 26.1864 32.467 35.152C32.467 44.1175 25.199 51.3855 16.2335 51.3855C7.26799 51.3855 0 44.1175 0 35.152Z" fill="#F5AD19"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M42.4228 15.1348C33.9574 15.1348 27.0947 21.9974 27.0947 30.4629C27.0947 38.9284 33.9574 45.791 42.4228 45.791C50.8883 45.791 57.751 38.9284 57.751 30.4629C57.751 21.9974 50.8883 15.1348 42.4228 15.1348ZM24.5371 30.4629C24.5371 20.5849 32.5448 12.5771 42.4228 12.5771C52.3009 12.5771 60.3086 20.5849 60.3086 30.4629C60.3086 40.3409 52.3009 48.3486 42.4228 48.3486C32.5448 48.3486 24.5371 40.3409 24.5371 30.4629Z" fill="#933A79"/>
					<path d="M49.1576 16.8012L46.4414 15.6985C46.4414 15.6985 46.3639 15.0891 46.3815 14.3493C46.3956 13.7539 46.4696 13 46.4696 13L48.9215 13.7398C48.9215 13.7398 48.8933 14.4092 48.9215 14.9165C48.9708 15.7866 49.154 16.8047 49.154 16.8047" fill="#007E59"/>
					<path d="M54.5442 39.7034L54.3223 36.7407C54.3223 36.7407 55.5623 35.9375 57.0419 35.5605C58.9196 35.0814 60.0047 35.2117 60.0047 35.2117L59.1627 37.7975C59.1627 37.7975 57.9614 37.8363 56.8024 38.2626C55.8406 38.6149 54.5477 39.7034 54.5477 39.7034" fill="#00667C"/>
					<path d="M32.2809 19.1756C32.2809 19.1756 32.7882 18.1821 32.8481 16.8716C32.8939 15.8746 32.8128 15.2722 32.8128 15.2722C32.8128 15.2722 33.2638 14.9411 33.9296 14.617C34.4651 14.3563 35.1837 14.0674 35.1837 14.0674C35.1837 14.0674 35.3423 14.7403 35.3564 15.5998C35.3704 16.4806 35.3564 17.0266 35.3564 17.0266C35.3564 17.0266 34.4017 17.4916 33.9613 17.7488C33.2109 18.1927 32.2773 19.1756 32.2773 19.1756" fill="#004589"/>
					<path d="M29.5917 38.1709C29.5917 38.1709 29.7925 39.0023 30.5745 40.0556C30.9867 40.6087 31.3919 40.9399 31.3919 40.9399C31.3919 40.9399 31.0818 41.7713 30.8317 42.2751C30.5217 42.8951 30.1553 43.494 30.1553 43.494C30.1553 43.494 29.486 42.9444 29.2253 42.6626C28.7603 42.1588 28.334 41.5775 28.334 41.5775C28.334 41.5775 28.6616 40.9963 29.0104 40.1261C29.3345 39.3158 29.5917 38.1709 29.5917 38.1709Z" fill="#F5AD19"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M31.4215 25.6576C31.6765 25.4132 32.0812 25.4217 32.3256 25.6767C34.5762 28.0245 38.3756 27.7325 40.4411 25.667C40.6908 25.4173 41.0956 25.4173 41.3453 25.667C41.595 25.9167 41.595 26.3216 41.3453 26.5713C38.8381 29.0785 34.2107 29.4911 31.4024 26.5616C31.1581 26.3067 31.1666 25.9019 31.4215 25.6576ZM43.646 25.6576C43.9009 25.4132 44.3057 25.4217 44.55 25.6767C46.8007 28.0245 50.6 27.7325 52.6655 25.667C52.9152 25.4173 53.3201 25.4173 53.5698 25.667C53.8195 25.9167 53.8195 26.3216 53.5698 26.5713C51.0626 29.0785 46.4351 29.4911 43.6269 26.5616C43.3825 26.3067 43.3911 25.9019 43.646 25.6576ZM34.5146 38.1004C34.7696 37.8561 35.1743 37.8646 35.4187 38.1195C39.3004 42.1689 45.8229 41.648 49.361 38.1099C49.6107 37.8602 50.0156 37.8602 50.2653 38.1099C50.515 38.3596 50.515 38.7644 50.2653 39.0141C46.2856 42.9939 38.9349 43.6356 34.4955 39.0045C34.2512 38.7496 34.2597 38.3448 34.5146 38.1004Z" fill="#933A79"/>
					<path d="M82.9316 15.3884H86.06C89.2235 15.3884 91.1189 17.0371 91.1189 19.7639C91.1189 22.4906 89.2059 24.1252 86.06 24.1252H85.2603V26.704H82.9316V15.3884ZM85.993 22.0784C87.8919 22.0784 88.7233 21.3139 88.7233 19.7639C88.7233 18.2138 87.8566 17.4352 85.993 17.4352H85.2603V22.0784H85.993Z" fill="#004589"/>
					<path d="M93.0332 15.3884H100.523V17.4352H95.3618V21.0321H99.9064V23.0261H95.3618V24.6572H100.755V26.704H93.0332V15.3884Z" fill="#004589"/>
					<path d="M103.018 15.3884H106.495C109.972 15.3884 112.452 17.703 112.452 21.0462C112.452 24.3894 109.989 26.704 106.495 26.704H103.018V15.3884ZM106.378 24.6572C108.89 24.6572 110.039 23.1599 110.039 21.0462C110.039 18.9325 108.89 17.4352 106.378 17.4352H105.346V24.6572H106.378Z" fill="#004589"/>
					<path d="M116.897 15.3884H114.568V26.704H116.897V15.3884Z" fill="#004589"/>
					<path d="M123.535 15.2896H123.736L128.911 26.7037H126.466L125.934 25.4214H121.34L120.808 26.7037H118.561L123.535 15.2896ZM125.099 23.4768L124.285 21.5145C123.951 20.7148 123.602 19.4853 123.602 19.4853C123.602 19.4853 123.271 20.7148 122.936 21.5145L122.122 23.4768H125.099Z" fill="#004589"/>
					<path d="M131.541 17.4352H128.311V15.3884H137.097V17.4352H133.87V26.704H131.541V17.4352Z" fill="#004589"/>
					<path d="M147.265 26.704H144.57L142.706 23.8434C142.491 23.8786 142.259 23.8927 142.04 23.8927H141.241V26.704H138.912V15.3884H142.04C145.2 15.3884 147.099 16.9033 147.099 19.6652C147.099 21.4302 146.317 22.5434 144.919 23.1775L147.265 26.704ZM141.974 21.8635C143.869 21.8635 144.704 21.2646 144.704 19.6687C144.704 18.0729 143.841 17.4388 141.974 17.4388H141.241V21.8635H141.974Z" fill="#004589"/>
					<path d="M151.608 15.3884H149.279V26.704H151.608V15.3884Z" fill="#004589"/>
					<path d="M153.721 21.046C153.721 17.7028 156.299 15.2544 159.544 15.2544C161.591 15.2544 163.056 15.9872 164.071 17.5689L162.292 18.8337C161.76 17.967 160.844 17.354 159.548 17.354C157.501 17.354 156.12 18.9358 156.12 21.0496C156.12 23.1633 157.501 24.7768 159.548 24.7768C161.013 24.7768 161.827 24.0792 162.461 23.114L164.275 24.3611C163.292 25.8935 161.728 26.8588 159.551 26.8588C156.307 26.8588 153.728 24.3963 153.728 21.0496" fill="#004589"/>
					<path d="M169.748 15.2896H169.949L175.124 26.7037H172.679L172.147 25.4214H167.553L167.021 26.7037H164.773L169.748 15.2896ZM171.312 23.4768L170.495 21.5145C170.16 20.7148 169.811 19.4853 169.811 19.4853C169.811 19.4853 169.48 20.7148 169.145 21.5145L168.332 23.4768H171.312Z" fill="#004589"/>
					<path d="M82.6289 43.473H83.6682V36.9697H82.6289V36.0608H85.9017V36.9697H84.8483V39.7422H89.1709V36.9697H88.1211V36.0608H91.3903V36.9697H90.3511V43.473H91.3903V44.396H88.1211V43.473H89.1709V40.711H84.8483V43.473H85.9017V44.396H82.6289V43.473Z" fill="#004589"/>
					<path d="M96.671 38.28C98.3726 38.28 99.2568 39.5307 99.2568 41.0772C99.2568 41.2287 99.2216 41.5141 99.2216 41.5141H94.8532C94.9237 42.8351 95.8572 43.5432 96.9176 43.5432C97.978 43.5432 98.7002 42.8704 98.7002 42.8704L99.1723 43.7088C99.1723 43.7088 98.2739 44.5367 96.8472 44.5367C94.9695 44.5367 93.6836 43.1804 93.6836 41.4084C93.6836 39.506 94.9695 38.28 96.671 38.28ZM98.0766 40.7848C98.0414 39.735 97.4038 39.1925 96.6499 39.1925C95.7762 39.1925 95.0681 39.7843 94.9025 40.7848H98.0766Z" fill="#004589"/>
					<path d="M104.997 40.7215H105.374V40.496C105.374 39.5519 104.832 39.2207 104.099 39.2207C103.155 39.2207 102.387 39.7985 102.387 39.7985L101.925 38.9847C101.925 38.9847 102.799 38.2766 104.191 38.2766C105.713 38.2766 106.516 39.0693 106.516 40.5806V43.2474C106.516 43.4236 106.611 43.5081 106.776 43.5081H107.379V44.3924H106.188C105.656 44.3924 105.445 44.1317 105.445 43.7441V43.6631C105.445 43.4271 105.491 43.2721 105.491 43.2721H105.466C105.466 43.2721 104.945 44.5368 103.493 44.5368C102.5 44.5368 101.51 43.959 101.51 42.7296C101.51 40.8518 104 40.7215 104.994 40.7215M103.743 43.649C104.758 43.649 105.385 42.6098 105.385 41.7114V41.4648H105.089C104.547 41.4648 102.669 41.4895 102.669 42.6344C102.669 43.1664 103.06 43.649 103.743 43.649Z" fill="#004589"/>
					<path d="M109.982 36.945H108.988V36.0608H111.127V42.6239C111.127 43.1312 111.243 43.473 111.764 43.473C111.955 43.473 112.081 43.4624 112.081 43.4624L112.067 44.4065C112.067 44.4065 111.831 44.4312 111.56 44.4312C110.711 44.4312 109.978 44.0895 109.978 42.6944V36.945H109.982Z" fill="#004589"/>
					<path d="M114.967 39.3055H113.963V38.4212H114.992V36.7795H116.112V38.4212H117.542V39.3055H116.112V42.1026C116.112 43.318 116.94 43.473 117.387 43.473C117.553 43.473 117.658 43.4625 117.658 43.4625V44.4172C117.658 44.4172 117.493 44.4418 117.246 44.4418C116.492 44.4418 114.967 44.2058 114.967 42.2118V39.309V39.3055Z" fill="#004589"/>
					<path d="M119.747 43.5082H120.692V36.945H119.688V36.0608H121.826V39.1539C121.826 39.4357 121.791 39.6506 121.791 39.6506H121.815C122.076 39.0729 122.855 38.2802 124.045 38.2802C125.451 38.2802 126.099 39.0482 126.099 40.5701V43.5117H127.033V44.396H124.954V40.8308C124.954 39.9923 124.778 39.33 123.82 39.33C122.65 39.33 121.826 40.3235 121.826 41.5988V43.5117H122.77V44.396H119.747V43.5117V43.5082Z" fill="#004589"/>
					<path d="M137.97 35.9163C139.432 35.9163 141.169 36.5081 141.169 37.5579V38.5866H140.084V37.9736C140.084 37.2761 138.985 36.9344 138.005 36.9344C136.057 36.9344 134.828 38.2555 134.828 40.1684C134.828 42.0813 136.078 43.5081 138.04 43.5081C138.784 43.5081 140.27 43.2826 140.27 42.4688V41.3697H138.643V40.4502H141.359V42.7894C141.359 44.0753 139.21 44.5368 137.959 44.5368C135.398 44.5368 133.602 42.6697 133.602 40.2036C133.602 37.7376 135.374 35.9163 137.97 35.9163Z" fill="#004589"/>
					<path d="M144.026 43.5079H144.924V39.5657C144.924 39.3896 144.829 39.305 144.663 39.305H143.92V38.4208H145.266C145.784 38.4208 146.034 38.6322 146.034 39.1183V39.4953C146.034 39.7313 146.009 39.9075 146.009 39.9075H146.034C146.305 39.0338 147.002 38.3503 147.922 38.3503C148.073 38.3503 148.218 38.375 148.218 38.375V39.5094C148.218 39.5094 148.077 39.4741 147.887 39.4741C146.611 39.4741 146.069 40.76 146.069 41.9296V43.5114H146.957V44.3956H144.029V43.5114L144.026 43.5079Z" fill="#004589"/>
					<path d="M153.44 38.28C155.223 38.28 156.664 39.5905 156.664 41.3978C156.664 43.205 155.223 44.5402 153.44 44.5402C151.658 44.5402 150.217 43.2191 150.217 41.3978C150.217 39.5765 151.658 38.28 153.44 38.28ZM153.44 43.5468C154.561 43.5468 155.494 42.6484 155.494 41.3978C155.494 40.1472 154.561 39.2735 153.44 39.2735C152.32 39.2735 151.386 40.1577 151.386 41.3978C151.386 42.6379 152.306 43.5468 153.44 43.5468Z" fill="#004589"/>
					<path d="M159.746 39.3051H158.742V38.4209H160.891V42.0107C160.891 42.8386 161.057 43.4974 162.011 43.4974C163.206 43.4974 163.949 42.3525 163.949 41.1723V39.3051H162.945V38.4209H165.094V43.2614C165.094 43.4269 165.189 43.5221 165.355 43.5221H165.982V44.3957H164.742C164.224 44.3957 163.984 44.1597 163.984 43.7334V43.4727C163.984 43.2719 164.009 43.1169 164.009 43.1169H163.984C163.864 43.434 163.192 44.5331 161.705 44.5331C160.419 44.5331 159.746 43.825 159.746 42.2432V39.3016V39.3051Z" fill="#004589"/>
					<path d="M169.007 45.8719V39.5659C169.007 39.3897 168.912 39.3052 168.746 39.3052H168.014V38.4209H169.338C169.87 38.4209 170.071 38.657 170.071 39.0128V39.0586C170.071 39.2488 170.046 39.4003 170.046 39.4003H170.071C170.071 39.4003 170.568 38.28 172.079 38.28C173.686 38.28 174.7 39.5553 174.7 41.4084C174.7 43.2614 173.555 44.5367 171.998 44.5367C170.688 44.5367 170.145 43.5221 170.145 43.5221H170.12C170.12 43.5221 170.156 43.7335 170.156 44.04V45.8683H171.1V46.7526H168.077V45.8683H169.011L169.007 45.8719ZM171.818 43.5468C172.763 43.5468 173.541 42.7788 173.541 41.4225C173.541 40.0661 172.844 39.2841 171.84 39.2841C170.955 39.2841 170.127 39.9111 170.127 41.433C170.127 42.4969 170.705 43.5468 171.815 43.5468" fill="#004589"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M82.2617 31.2236C82.2617 31.1059 82.3571 31.0105 82.4749 31.0105H174.673C174.79 31.0105 174.886 31.1059 174.886 31.2236C174.886 31.3413 174.79 31.4368 174.673 31.4368H82.4749C82.3571 31.4368 82.2617 31.3413 82.2617 31.2236Z" fill="#004589"/>
				</svg>
			</a>
			<nav class="header__nav">
				<div>
					<?php
						wp_nav_menu(
							array(
								'items_wrap'=> '%3$s', 
								'walker' => new Nav_Header_Walker(), 
								'container'=> false, 
								'menu_class' => '', 
								'theme_location'=>'primary', 
								'fallback_cb'=> false 
							)
						);
					?>

					<div class="wp-block-button is-style-outline">
						<a href="https://health.healow.com/rpcj" title="Go to the Patient Portal" class="wp-block-button__link has-blue-background-color wp-element-button" target="_blank">Patient Portal</a>
					</div>
					<div class="wp-block-button is-style-has-rounded-arrow">
						<a href="https://health.healow.com/rpcj" title="Schedule a Visit" class="wp-block-button__link has-blue-background-color has-background wp-element-button" target="_blank">Schedule a Visit</a>
					</div>
				</div>

				<button class="do--menu">
					<a href="#menu"></a>
					<a href="#!"></a>
				</button>
			</nav>
		</div>
	</header>