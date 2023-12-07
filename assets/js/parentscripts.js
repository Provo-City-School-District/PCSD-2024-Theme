//Reloads page on orientation change
//window.onorientationchange = function() { window.location.reload(); };
/*
=============================================================================================================
Slider controls
=============================================================================================================
*/
jQuery(document).ready(function () {
  jQuery(".departmentNews").slick({
    autoplay: true,
    arrows: false,
    mobileFirst: true,
    autoplaySpeed: 10000,
  });
});
jQuery(document).ready(function () {
  jQuery("#announcments .slick-wrapper").slick({
    autoplay: true,
    autoplaySpeed: 10000,
  });
});
/*
=============================================================================================================
Post Featured Gallery Slider controls
=============================================================================================================
*/
jQuery(".featured-for").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: ".featured-nav",
  adaptiveHeight: true,
});
jQuery(".featured-nav").slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  asNavFor: ".featured-for",
  centerMode: true,
  focusOnSelect: true,
});
/*
=============================================================================================================
accordion
=============================================================================================================
*/
jQuery(".accordion li").click(function () {
  jQuery(this).toggleClass("active");
});
/*
==========================================================
accordion using a header 3 as the control and a div beneath as the panel
==========================================================
*/
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
/*
=============================================================================================================
Navigation Scripts
=============================================================================================================
*/
// if (jQuery) {
//   (function (jQuery) {
//     "use strict";
//     jQuery(document).ready(function () {
//       // initialize the megamenu
//       jQuery(".megamenu").accessibleMegaMenu();

//       // hack so that the megamenu doesn't show flash of css animation after the page loads.
//       setTimeout(function () {
//         jQuery("body").removeClass("init");
//       }, 500);
//     });
//   })(jQuery);
// }
// jQuery("nav:first").accessibleMegaMenu({
//   /* prefix for generated unique id attributes, which are required
// 			   to indicate aria-owns, aria-controls and aria-labelledby */
//   uuidPrefix: "accessible-megamenu",

//   /* css class used to define the megamenu styling */
//   menuClass: "nav-menu",

//   /* css class for a top-level navigation item in the megamenu */
//   topNavItemClass: "nav-item",

//   /* css class for a megamenu panel */
//   panelClass: "sub-nav",

//   /* css class for a group of items within a megamenu panel */
//   panelGroupClass: "sub-nav-group",

//   /* css class for the hover state */
//   hoverClass: "hover",

//   /* css class for the focus state */
//   focusClass: "focus",

//   /* css class for the open state */
//   openClass: "open",
// });
/*
=============================================================================================================
Directory Live Page Search
=============================================================================================================
*/
jQuery(document).ready(function () {
  jQuery("#filter").keyup(function () {
    // Retrieve the input field text and reset the count to zero
    var filter = jQuery(this).val(),
      count = 0;

    // Loop through the post list
    jQuery(".postgrid .post").each(function () {
      // If the list item does not contain the text phrase fade it out
      if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
        //jQuery(this).addClass('hide');
        jQuery(this).fadeOut();

        // Show the list item if the phrase matches and increase the count by 1
      } else {
        jQuery(this).show();
        count++;
      }
    });
  });
});
jQuery(document).ready(function () {
  jQuery("#sidebar-filter").keyup(function () {
    // Retrieve the input field text and reset the count to zero
    var filter = jQuery(this).val(),
      count = 0;

    // Loop through the post list
    jQuery(".directory .post").each(function () {
      // If the list item does not contain the text phrase fade it out
      if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
        //jQuery(this).addClass('hide');
        jQuery(this).fadeOut();

        // Show the list item if the phrase matches and increase the count by 1
      } else {
        jQuery(this).show();
        count++;
      }
    });
  });
});

/*
=============================================================================================================
Analytics page scrolling detection
=============================================================================================================
// */
// jQuery(function (jQuery) {
//   // Debug flag
//   var debugMode = false;

//   // Default time delay before checking location
//   var callBackTime = 100;

//   // # px before tracking a reader
//   var readerLocation = 150;

//   // Set some flags for tracking & execution
//   var timer = 0;
//   var scroller = false;
//   var endContent = false;
//   var didComplete = false;

//   // Set some time variables to calculate reading time
//   var startTime = new Date();
//   var beginning = startTime.getTime();
//   var totalTime = 0;

//   // Get some information about the current page
//   var pageTitle = document.title;

//   // Track the aticle load
//   // if (!debugMode) {
//   //    _gaq.push(['_trackEvent', 'Reading', 'ArticleLoaded', '', , true]);
//   // } else {
//   //    alert('The page has loaded. Woohoo.');
//   // }

//   // Check the location and track user
//   function trackLocation() {
//     bottom = jQuery(window).height() + jQuery(window).scrollTop();
//     height = jQuery(document).height();

//     // If user starts to scroll send an event
//     if (bottom > readerLocation && !scroller) {
//       currentTime = new Date();
//       scrollStart = currentTime.getTime();
//       timeToScroll = Math.round((scrollStart - beginning) / 1000);
//       if (!debugMode) {
//         _gaq.push(["_trackEvent", "Reading", "StartReading", "", timeToScroll]);
//       } else {
//         alert("started reading " + timeToScroll);
//       }
//       scroller = true;
//     }

//     // If user has hit the bottom of the content send an event
//     if (
//       bottom >=
//         jQuery(".content").scrollTop() + jQuery(".content").innerHeight() &&
//       !endContent
//     ) {
//       currentTime = new Date();
//       contentScrollEnd = currentTime.getTime();
//       timeToContentEnd = Math.round((contentScrollEnd - scrollStart) / 1000);
//       if (!debugMode) {
//         _gaq.push([
//           "_trackEvent",
//           "Reading",
//           "ContentBottom",
//           "",
//           timeToContentEnd,
//         ]);
//       } else {
//         alert("end content section " + timeToContentEnd);
//       }
//       endContent = true;
//     }

//     // If user has hit the bottom of page send an event
//     if (bottom >= height && !didComplete) {
//       currentTime = new Date();
//       end = currentTime.getTime();
//       totalTime = Math.round((end - scrollStart) / 1000);
//       if (!debugMode) {
//         if (totalTime < 30) {
//           _gaq.push(["_setCustomVar", 5, "ReaderType", "Scanner", 2]);
//         } else {
//           _gaq.push(["_setCustomVar", 5, "ReaderType", "Reader", 2]);
//         }
//         _gaq.push([
//           "_trackEvent",
//           "Reading",
//           "PageBottom",
//           pageTitle,
//           totalTime,
//         ]);
//       } else {
//         alert("bottom of page " + totalTime);
//       }
//       didComplete = true;
//     }
//   }

//   // Track the scrolling and track location
//   jQuery(window).scroll(function () {
//     if (timer) {
//       clearTimeout(timer);
//     }

//     // Use a buffer so we don't call trackLocation too often.
//     timer = setTimeout(trackLocation, callBackTime);
//   });
// });
/*
=============================================================================================================
sort list alpha by giving it the class sortList
=============================================================================================================
*/
jQuery(window).on("load", function () {
  var elem = jQuery(".sortList"); //replace this with your list selector
  sortList(elem);
  function sortList($elem) {
    var $li = $elem.find("li"),
      $listLi = jQuery($li, $elem).get();
    $listLi.sort(function (a, b) {
      var keyA = jQuery(a).text().toUpperCase();
      var keyB = jQuery(b).text().toUpperCase();
      return keyA < keyB ? -1 : 1;
      //uncomment below and comment above if you want descending order
      //return (keyA > keyB) ? -1 : 1;
    });
    jQuery.each($listLi, function (index, row) {
      $elem.append(row);
    });
  }
});

/*
=============================================================================================================
I am Click to toggle
=============================================================================================================
*/
//toggles the .on class to I Am buttons to activate menu flyout.
// jQuery("#iamparent").click(function () {
//   jQuery(".on").not(this).removeClass("on");
//   jQuery(this).toggleClass("on");
// });
// jQuery("#iamstudent").click(function () {
//   jQuery(".on").not(this).removeClass("on");
//   jQuery(this).toggleClass("on");
// });

//makes the main anchor on the Iam Buttons not work if the viewport is above 685px.
// jQuery(document).ready(function () {
//   jQuery("#iamparent > a:first-child").on("click", function (e) {
//     if (jQuery(window).width() > 685) {
//       e.preventDefault();
//     }
//   });
// });
// jQuery(document).ready(function () {
//   jQuery("#iamstudent > a:first-child").on("click", function (e) {
//     if (jQuery(window).width() > 685) {
//       e.preventDefault();
//     }
//   });
// });

//Clicking the X on the alert will close the alert section. it will also set a cookie with the name "alert"
jQuery(".closeAlert").click(function () {
  jQuery(".alerts").css("display", "none");
  setcookie("alert");
});
//function used to read cookies in browser
function getCookie(cName) {
  const name = cName + "=";
  const cDecoded = decodeURIComponent(document.cookie); //to be careful
  const cArr = cDecoded.split("; ");
  let res;
  cArr.forEach((val) => {
    if (val.indexOf(name) === 0) res = val.substring(name.length);
  });
  return res;
}
//if a cookie named "alert" exists the alert box will automatically close
if (getCookie("alert")) {
  // Re-direct to this page
  jQuery(".alerts").css("display", "none");
}

/*
=============================================================================================================
keeps Alerts on top of Iambuttons if active, but Iam above alerts if not active
=============================================================================================================
jQuery('#distAlerts').click(function() {
	if(jQuery('.theAlerts').hasClass('active')) {
		jQuery('#iAmMenu').css('z-index','600');
	} else {
		jQuery('#iAmMenu').css('z-index','1100');
	}
});
/*
=============================================================================================================
Set cookie that expires at the end of the day
=============================================================================================================
*/
function setcookie(cname, cvalue) {
  //expire in a year
  //var d = new Date();
  //d.setTime(d.getTime() + (24 * 60 * 60 * 1000 * 7));
  //var expires = "expires="+d.toUTCString();
  //expire at midnight the following day

  var now = new Date();
  var expire = new Date();

  expire.setFullYear(now.getFullYear());
  expire.setMonth(now.getMonth());
  expire.setDate(now.getDate() + 1);
  expire.setHours(0);
  expire.setMinutes(0);
  expire.setSeconds(0);

  var expires = "expires=" + expire.toString();
  document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
}
/*
=============================================================================================================
If I am button is active, change news zindex so that it goes behind the pop up box
=============================================================================================================
*/ /*
jQuery(function(){
	if(jQuery('body').hasClass('.page-template-template-FrontPage')){
		var newsid = document.getElementById("homeNews");
		document.getElementById("iAmMenu").onclick = function() {
			if (newsid.style.zIndex != "800") {
				document.getElementById("homeNews").style.zIndex = "800";
			}else {
				document.getElementById("homeNews").style.zIndex = "875";
			}
		}
	}
});
/*
=============================================================================================================
If cookie alertcookie is found strip active tag from active alerts
=============================================================================================================
*/
jQuery(document).ready(function () {
  if (Cookies.get("alertcookie") == "yes") {
    jQuery("#distAlerts .theAlerts").removeClass("active");
  }
});
/*
=============================================================================================================
Recaptcha
=============================================================================================================
*/
function onSubmit(token) {
  document.getElementById("emailForm").submit();
}
function onClick(e) {
  e.preventDefault();
  grecaptcha.ready(function () {
    grecaptcha
      .execute("6LckCL0ZAAAAAGx733fhC7SB8zd3s_aczlGdlnvT", { action: "submit" })
      .then(function (token) {
        // Add your logic to submit to your backend server here.
      });
  });
}
/*
==================================================================================================
email helpdesk form
==================================================================================================
*/
//var bannedDomains = ["spam.com", "provo.edu"];
//document.addEventListener( 'wpcf7submit', function( event ) {
//	  if ( '51410' == event.detail.contactFormId ) {
//		//alert( "The contact form ID is 51410." );
//		if( 'your-email' )
// do something productive
//	  }
//	}, false );
/*
==================================================================================================
school demo page
https://provo.edu/school-demographics/
==================================================================================================

var schoolDemo = document.getElementsByClassName("demographics");
var schoolDemoCounter;
for( schoolDemoCounter = 0; schoolDemoCounter < schoolDemo.length; schoolDemoCounter++ ){
	schoolDemo[schoolDemoCounter].addEventListener("click", function(e) {
		// Toggle between adding and removing the "active" class,
		//to highlight the button that controls the panel
		if( jQuery(e.target).is('a') || jQuery(e.target).is('.active img') || jQuery(e.target).is('li') ) {

		} else {
			this.classList.toggle("active");
		}
	});
}
*/
/*
==================================================================================================
make video on home page autoplay despite browser controls
==================================================================================================
*/
// var autoPlayVideo = document.getElementById("heroVideo");
// autoPlayVideo.oncanplaythrough = function () {
//   autoPlayVideo.muted = true;
//   autoPlayVideo.play();
//   autoPlayVideo.pause();
//   autoPlayVideo.play();
// };


