<form role="search" method="get" class="search-form group" action="<?php echo home_url( '/' ); ?>">
    <div class="input-group">
        <input type="search" class="form-control search_box" placeholder="<?php echo esc_attr_x( 'Buscar …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" /> <span class="input-group-btn">
    <button class="btn btn-primary search-button" >
        <i class="fa fa-search" aria-hidden="true"></i>
    </button>
    </span> </div>
</form>