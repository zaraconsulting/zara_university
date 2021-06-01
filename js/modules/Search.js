import $ from 'jquery';

class Search {
    constructor() {
        this.openButton = $('.js-search-trigger');
        this.closeButton = $('.search-overlay__close');
        this.searchOverlay = $('.search-overlay');
        this.searchField = $('#search-term');
        this.resultsDiv = $('#search-overlay__results');
        this.events();
        this.isOverlayOpen = false;
        this.isSpinnerVisible = false;
        this.previousValue;
        this.typingTimer;
    }

    events = () => {
        this.openButton.on('click', this.open_overlay);
        this.closeButton.on('click', this.close_overlay);
        $(document).on('keydown', (e) => this.keypressDispatcher(e));
        this.searchField.on('keyup', (e) => this.typingLogic(e));
    }

    getResults = () => {
        this.resultsDiv.html('Imagine real search results here...');
        this.isSpinnerVisible = false;
    }

    typingLogic = (e) => {
        if (this.searchField.val() !== this.previousValue) {
            clearTimeout(this.typingTimer);

            if (this.searchField.val()) {
                if (!this.isSpinnerVisible) {
                    this.resultsDiv.html('<div class="spinner-loader"></div>');
                    this.isSpinnerVisible = true;
                }
                this.typingTimer = setTimeout(() => {
                    this.getResults();
                }, 2000);
                this.previousValue = this.searchField.val();
            }
            else {
                this.resultsDiv.html('');
                this.isSpinnerVisible = false;
            }

        }
    }

    keypressDispatcher = (e) => {
        if (e.keyCode === 83 && !this.isOverlayOpen && $('input, textarea').is(':focus')) 
        {
            this.open_overlay();
        }
        if (e.keyCode === 27 && this.isOverlayOpen) 
        {
            this.close_overlay();
        }
    }
    
    open_overlay = () => {
        
        this.searchOverlay.addClass('search-overlay--active');
        $('body').addClass('body-no-scroll');
        this.isOverlayOpen = true;
    }
    
    close_overlay = () => {

        this.searchOverlay.removeClass('search-overlay--active');
        $('body').removeClass('body-no-scroll');
        this.isOverlayOpen = false;
    }
}

export default Search;