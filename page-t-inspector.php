<?php
/*
Template Name: Inspector Rampage
*/
?>
<?php get_header(); ?>
<div class="content">
    <div class="inner-content">
        <main class="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
            <div ng-app="benson" ng-controller="MainController">
    

<div class="header fixed">
	<form class="form-inline">
        <input ng-model="query" type="text" placeholder="Filter by" autofocus>
    </form>
    <div class="nofn">Showing {{(data | filter: query).length}} of {{data.length}} posts.</div>
</div>


                <div class="rampages">
                    <article class="rampage" ng-repeat="post in data | filter: query">
                        <header class="article-header">
                            <h2><a href="{{post.meta.url}}">{{post.rampage.site_title}}</a></h1>
                        </header>
                        <section class="entry-content" itemprop="articleBody">
                            
                           	<div ng-click="show=!show" 
								 ng-class="{show: show}"
                           		 class="thumbnail">
	                            <img ng-if="post.meta.screenshot.sizes.thumbnail" src="{{ post.meta.screenshot.sizes.thumbnail }}" />
	                            <img ng-if="!post.meta.screenshot.sizes.thumbnail" src="http://placebear.com/300/300" />
							</div>

							<div class="meta" ng-if="show">
								<p>
									<strong>Title:</strong> {{post.rampage.site_title}}<br/>
		                            <strong>URL:</strong> <a href="{{post.meta.url}}">{{post.meta.url}}</a><br/>
		                            <strong>Description:</strong> {{post.rampage.site_description}}<br/>
		                            <strong>Theme:</strong> {{post.rampage.theme}}<br/>
		                <?php if ( is_super_admin( get_current_user_id() ) ){ ?> 
		                			<strong>Admin Email:</strong> <a href="mailto:{{post.rampage.admin_email}}">{{post.rampage.admin_email}}</a><br/> 
		                <?php } ?>
		                            <strong>Active Plugins:</strong>
		                            <ul>
		                                <li ng-repeat="plugin in post.rampage.active_plugins" 
		                                    ng-click="setQuery(plugin)"
		                                    class="clickable">{{plugin}}</li>
		                            </ul>
	                            </p>
									
	                            <p ng-if="post.terms.post_tag">
	                            	<strong>Tags</strong> |
	                            		<span ng-repeat="tag in post.terms.post_tag" 
	                            			  ng-click="setQuery(tag.name)"> 
	                            			<span class="clickable"> {{tag.name}}</span>
	                            		|</span>
	                            </p>

	                            <p ng-if="post.terms.category">
	                            	<strong>Categories</strong> |
	                            		<span ng-repeat="cat in post.terms.category" 
	                            			  ng-click="setQuery(cat.name)"> 
	                            			<span class="clickable"> {{cat.name}}</span>
	                            		|</span>
	                            </p>
							</div>
                            
                        </section>
                    </article>
                </div>
            </div>
        </main>
    </div>
</div>
<?php get_footer(); ?>