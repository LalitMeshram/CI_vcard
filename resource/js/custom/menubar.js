var base_url = localStorage.getItem('url');
var userid = localStorage.getItem('userid');
var token = localStorage.getItem('token');
var access = JSON.parse(localStorage.getItem("access"));
//console.log(access[0].activity_title);
function  setMenubar() {
    var menus = '<li class="header nav-small-cap">PERSONAL</li>';
    for (var i = 0; i < access.length; i++) {
        menus += `
            <li>
                <a href="`+base_url+access[i].url+`">
                    <i class="fa fa-dashboard"></i> <span>`+access[i].activity_title+`</span>
                </a>
            </li>
        `;
    }
    $('.sidebar-menu').html(menus);
}
setMenubar();
