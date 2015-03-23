

<div class="mycontainer" ng-controller="FaqsController" >
    
    <div class="left-nav">
        <accordion close-others="true" is-open="isopen">
            <accordion-group   ng-repeat="item in faqs">
                <accordion-heading >
                    <div>
                        <div class="input-group-addon quest-faq">Q</div>
                         <a href="#" class="dash-dropdown">
                         
                         <i class="fa fa-angle-left" style="position: absolute;right: 15px;"></i>
                         <span style="cursor: pointer;"> {{item.Faq.question}} </span>
                         </a>
<!--                    <i class="pull-right glyphicon"
                       ng-class="{'glyphicon-chevron-down': isopen, 'glyphicon-chevron-right': !isopen}" style="margin-top: 10px;"></i>-->
                        </div>
                </accordion-heading>
                <div class="input-group-addon quest-faq" style="left: 0px;top: 0px; color:green">R</div>
                <span >{{item.Faq.reponse}}</span>
            </accordion-group>
        </accordion>
    </div>

    <div class="content">
    </div>
</div>


<?php echo $this->Html->script('angular.min');  ?>
<?php echo $this->Html->script('ui-bootstrap-tpls-0.10.0.js');  ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
    

var app = angular.module("myApp", ['ui.bootstrap']);
 
    app.controller('FaqsController', ['$scope','$http', function (scope,$http) {
     scope.$parent.isopen = (scope.$parent.default === scope.item)

    scope.$watch('isopen', function (newvalue, oldvalue, scope) {
    scope.$parent.isopen = newvalue;
});
    $http.get('http://local.dev/rest.api.news/faqs.json').success(function (response) {
    scope.faqs = response;
    console.log(response);

});
}]);


                        jQuery().ready(function () {
                            $('.dash-dropdown').click(function (e) {
                                e.preventDefault();
                                if ($('.dash-dropdown-menu').is(':hidden')) {
                                    $('.dash-dropdown .fa-angle-left').css('transform', 'rotate(-90deg)').css('-webkit-transform', 'rotate(-90deg)').css('-ms-transform', 'rotate(-90deg)');
                                    $('.dash-dropdown-menu').slideDown();
                                } else {
                                    $('.dash-dropdown .fa-angle-left').css('transform', 'rotate(0)').css('-webkit-transform', 'rotate(0)').css('-ms-transform', 'rotate(0)');
                                    $('.dash-dropdown-menu').slideUp();
                                }
                            });
                        });
           
<?php echo $this->Html->scriptEnd(); ?>


