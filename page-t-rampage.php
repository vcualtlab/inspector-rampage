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
                <form class="form-inline">
                    <input ng-model="query" type="text" placeholder="Filter by" autofocus>
                </form>
                Showing {{(data | filter: query).length}} of {{data.length}} posts.
                <div class="rampages">
                    <article class="rampage" ng-repeat="post in data | filter: query">
                        <header class="article-header">
                            <h2><a href="{{post.meta.url}}">{{post.rampage.site_title}}</a></h1>
                        </header>
                        <section class="entry-content" itemprop="articleBody">
                            
                           	<div ng-click="show=!show">
	                            <img ng-if="post.meta.screenshot.sizes.thumbnail" src="{{ post.meta.screenshot.sizes.thumbnail }}" />
	                            <img ng-if="!post.meta.screenshot.sizes.thumbnail" src="http://placebear.com/300/300" />
							</div>

							<div class="meta" ng-if="show">
								<p>
									<strong>Title:</strong> {{post.rampage.site_title}}<br/>
		                            <strong>URL:</strong> <a href="{{post.meta.url}}">{{post.meta.url}}</a><br/>
		                            <strong>Description:</strong> {{post.rampage.site_description}}<br/>
		                            <strong>Theme:</strong> {{post.rampage.theme}}<br/>
		                            <strong>Admin Email:</strong> <a href="mailto:{{post.rampage.admin_email}}">{{post.rampage.admin_email}}</a><br/>
		                            <ul>
		                                <li ng-repeat="plugin in post.rampage.active_plugins">{{plugin}}</li>
		                            </ul>
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