<!-- <form role="search" method="get" action="https://developer.wordpress.org/" class="wp-block-search__button-inside wp-block-search__icon-button wp-block-search"><label class="wp-block-search__label screen-reader-text" for="wp-block-search__input-13">Search</label><div class="wp-block-search__inside-wrapper " style="width: 232px"><div class="awesomplete"><input class="wp-block-search__input" id="wp-block-search__input-13" placeholder="Search resources" value="" type="search" name="s" required="" autocomplete="off" aria-autocomplete="list"><ul hidden=""></ul><span class="visually-hidden" role="status" aria-live="assertive" aria-relevant="additions"></span></div><button aria-label="Search" class="wp-block-search__button has-icon wp-element-button" type="submit"><svg class="search-icon" viewBox="0 0 24 24" width="24" height="24">
					<path d="M13 5c-3.3 0-6 2.7-6 6 0 1.4.5 2.7 1.3 3.7l-3.8 3.8 1.1 1.1 3.8-3.8c1 .8 2.3 1.3 3.7 1.3 3.3 0 6-2.7 6-6S16.3 5 13 5zm0 10.5c-2.5 0-4.5-2-4.5-4.5s2-4.5 4.5-4.5 4.5 2 4.5 4.5-2 4.5-4.5 4.5z"></path>
				</svg></button></div></form> -->

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	<input type="search" class="search-field" placeholder="Cari artikel disini..." value="<?php echo get_search_query(); ?>" name="s" />
    <button type="submit" class="search-submit">Cari</button>
</form>
