var App = function() {
    var MediaSize = {
        xl: 1200,
        lg: 992,
        md: 991,
        sm: 576
    };
    var ToggleClasses = {
        headerhamburger: '.toggle-sidebar',
        inputFocused: 'input-focused',
    };

    var Selector = {
        mainHeader: '.header.navbar',
        headerhamburger: '.toggle-sidebar',
        fixed: '.fixed-top',
        mainContainer: '.main-container',
        sidebar: '#sidebar',
        sidebarContent: '#sidebar-content',
        sidebarStickyContent: '.sticky-sidebar-content',
        ariaExpandedTrue: '#sidebar [aria-expanded="true"]',
        ariaExpandedFalse: '#sidebar [aria-expanded="false"]',
        contentWrapper: '#content',
        contentWrapperContent: '.container',
        mainContentArea: '.main-content',
        searchFull: '.toggle-search',
        overlay: {
            sidebar: '.overlay',
            cs: '.cs-overlay',
            search: '.search-overlay'
        }
    };

    // Default Enabled

    var toggleFunction = {
        sidebar: function() {
            $('.sidebarCollapse').on('click', function (sidebar) {
                sidebar.preventDefault();
                $(Selector.mainContainer).toggleClass("topbar-closed");
                $(Selector.mainContainer).toggleClass("sbar-open");
                $('.overlay').toggleClass('show');
                $('html,body').toggleClass('sidebar-noneoverflow');
            });
        },
        overlay: function() {
            $('#dismiss, .overlay').on('click', function () {
                // hide sidebar
                $(Selector.mainContainer).removeClass('topbar-closed');
                // hide overlay
                $('.overlay').removeClass('show');
                $('html,body').removeClass('sidebar-noneoverflow');
            });
        },
        deactivateScroll: function() {
            const ps = new PerfectScrollbar('#topbar');
            ps.destroy();
        },
        search: function() {
            $(Selector.searchFull).click(function(event) {
                // console.log('dfdfdf')
               $(this).parents('.search-animated').find('.search-full').addClass(ToggleClasses.inputFocused);
               $(this).parents('.search-animated').addClass('show-search');
               $(Selector.overlay.search).addClass('show');
               $(Selector.overlay.search).addClass('show');
            });

            $(Selector.overlay.search).click(function(event) {
               $(this).removeClass('show');
               $(Selector.searchFull).parents('.search-animated').find('.search-full').removeClass(ToggleClasses.inputFocused);
               $(Selector.searchFull).parents('.search-animated').removeClass('show-search');
            });
        }
    }

    var mobileFunctions = {
        activateScroll: function() {
            const ps = new PerfectScrollbar('#topbar', {
                wheelSpeed:.5,
                swipeEasing:!0,
                minScrollbarLength:40,
                maxScrollbarLength:300
            });
        },
    }
    var desktopFunctions = {
        activateScroll: function() {
            const desktopFncScroll = new PerfectScrollbar('.menu-categories li.menu .submenu', {
                wheelSpeed:.5,
                swipeEasing:!0,
                minScrollbarLength:40,
                maxScrollbarLength:300
            });
        },
        preventAccordionOnClick: function() {
            if(document.body.classList.contains('alt-click-menu')) {
                return;
            } else {
                $('.menu > a[data-toggle="collapse"], .menu.single-menu  a[data-toggle="collapse"]').click(function(e){
                    getWindowWidth = window.innerWidth;
                    if (getWindowWidth > 991) {
                        e.preventDefault(); // to stop the page jump to the anchor target.
                        e.stopPropagation();
                    }
                })
            }
        }
    }

    /*
        Production Functionality - Only for Online files not for user files
    */
    var productionFunctionality = {
        createButtons: function() {
            var form = [
                {
                    type: 'anchor',
                    label: 'Buy Now',
                    target: '_blank'
                },
                {
                    type: 'button',
                    label: ''
                }
            ];
            
            var element = document.createElement("div");
            var wrapHtmlAttr = document.createAttribute("class");
            wrapHtmlAttr.value = "online-actions";
            element.style.cssText = "position: fixed;bottom: 43px;right: 21px;z-index: 1025;";
            element.setAttributeNode(wrapHtmlAttr);
            for (var i = 0; i < form.length; i++) {
                var obj = form[i];
                switch (obj.type) {
                    case "button":
                        var button = document.createElement('button');
                        var textButton = document.createTextNode(obj.label);
                        button.innerHTML = '<svg style="width: 15px; height: 15px; stroke-width: 2; vertical-align: middle;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>';
                        button.style.cssText = " margin-left: 6px;padding: 6px 9px; display: none; border: none;box-shadow: 0 10px 20px -10px #4801FF; background-image: linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%);";
                        button.classList.add('btn', 'btn-secondary', 'scroll-top-btn');
                        button.appendChild(textButton);
                        element.appendChild(button);
                        break;
            
                    // case "anchor":
                    //     var anchor = document.createElement('a');
                    //     var textanchor = document.createTextNode(obj.label);
                    //     anchor.setAttribute('href',"https://themeforest.net/item/cork-responsive-admin-dashboard-template/25582188");
                    //     anchor.style.cssText = "border: none; background-image: linear-gradient(to right, #ff0844 20%, #ffb199 141%);box-shadow: 0 10px 20px -10px #ff0844;";
                    //     anchor.classList.add('btn', 'btn-danger', 'buy-btn');
                    //     anchor.target = obj.target;
                    //     anchor.appendChild(textanchor);
                    //     element.appendChild(anchor);
                    //     break;
                }
                var div = document.querySelector("body");
                div.appendChild(element);
            }
        },

        scrollTop: function() {
            $(document).on('click', '.scroll-top-btn', function(event) {
                event.preventDefault();
                var body = $("html, body");
                body.stop().animate({scrollTop:0}, 500, 'swing');
            });
        },

        checkScrollPosition: function() {
            $(document).scroll(function(event) {
                var lanWrapper = $('.layout-spacing');
                var elementScrollToTop = $('.scroll-top-btn');
                var windowScroll = $(window).scrollTop()
                var elementoffset = lanWrapper.offset().top;
            
                // Check if window scroll > or == element offset?
                if (windowScroll >= elementoffset) {
                elementScrollToTop.addClass('d-inline-block');
                } else if (windowScroll < elementoffset) {
                elementScrollToTop.removeClass('d-inline-block');
                }
            });
        }
    }

    var inBuiltfunctionality = {
        preventScrollBody: function() {
            $('#topbar').bind('mousewheel DOMMouseScroll', function(e) {
                var scrollTo = null;

                if (e.type == 'mousewheel') {
                    scrollTo = (e.originalEvent.wheelDelta * -1);
                }
                else if (e.type == 'DOMMouseScroll') {
                    scrollTo = 40 * e.originalEvent.detail;
                }

                if (scrollTo) {
                    e.preventDefault();
                    $(this).scrollTop(scrollTo + $(this).scrollTop());
                }
            });
        },
        closeDropdownDocumentClick: function() {
            $(document).click(function(event){
                $('.topbar-nav .collapse').collapse('hide')
            });
        },
        default: function() {
            $(document).scroll(function(event) {

              var elementMainContent = $('.main-content');
              var elementNavbar = $( '.topbar-nav');
              var sideNav = $('.sidenav');
              var elementOffset = elementMainContent.offset().top;
              var windowScroll = $(window).scrollTop();
              // Check if window scroll > or == element offset?
                if (windowScroll >= elementOffset) {
                    sideNav.css('top', '147px');
                } else if (windowScroll < elementOffset) {
                    sideNav.css('top', '147px');
                }

            });
        },
        languageDropdown: function() {
            var getDropdownElement = document.querySelectorAll('.more-dropdown .dropdown-item');
            for (var i = 0; i < getDropdownElement.length; i++) {
                getDropdownElement[i].addEventListener('click', function() {
                    document.querySelectorAll('.more-dropdown .dropdown-toggle > span')[0].innerText = this.getAttribute('data-value');
                    document.querySelectorAll('.more-dropdown .dropdown-toggle > img')[0].setAttribute('src', 'assets/img/' + this.getAttribute('data-img-value') + '.svg' );
                })
            }
        },
    }

    var _mobileResolution = {
        onRefresh: function() {
            var windowWidth = window.innerWidth;
            if ( windowWidth <= MediaSize.md ) {
                console.log('On Mobile Refresh');
                toggleFunction.search();
                mobileFunctions.activateScroll();
            }
        },
        onResize: function() {
            $(window).on('resize', function(event) {
                event.preventDefault();
                var windowWidth = window.innerWidth;
                if ( windowWidth <= MediaSize.md ) {
                    toggleFunction.search();
                    console.log('On Mobile Resize');
                }
            });
        }
    }

    var _desktopResolution = {
        onRefresh: function() {
            var windowWidth = window.innerWidth;
            if ( windowWidth > MediaSize.md ) {
                toggleFunction.search();
                inBuiltfunctionality.closeDropdownDocumentClick();
                console.log('On Desktop Refresh');
                desktopFunctions.preventAccordionOnClick();
            }
        },
        onResize: function() {
            $(window).on('resize', function(event) {
                event.preventDefault();
                var windowWidth = window.innerWidth;
                if ( windowWidth > MediaSize.md ) {
                    toggleFunction.search();
                    toggleFunction.deactivateScroll();
                    inBuiltfunctionality.closeDropdownDocumentClick();
                    console.log('On Desktop Resize');
                }
            });
        }
    }

    return {
        init: function() {
            
            // Sidebar fn
            toggleFunction.sidebar();
            // Overlay fn
            toggleFunction.overlay();
            // Desktop Resoltion fn
            _desktopResolution.onRefresh();
            _desktopResolution.onResize();
            // Mobile Resoltion fn
            _mobileResolution.onRefresh();
            _mobileResolution.onResize();

            if (!$('body').hasClass('alt-menu')) {
                inBuiltfunctionality.default();
            }

            inBuiltfunctionality.languageDropdown();

            /*
                Production Functionality - Only for Online files not for user files
            */
            productionFunctionality.createButtons();
            productionFunctionality.scrollTop();
            productionFunctionality.checkScrollPosition();
        },
    }

}();
