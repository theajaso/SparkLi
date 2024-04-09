from django.urls import path
from . import views
from django.conf import settings
from django.conf.urls.static import static

urlpatterns = [

    path('', views.page_14, name='home'),  # Redirect to page_14 view
    path('grade3_pretest.php', views.grade3_pretest, name='grade3_pretest'),
    path('grade3_questionaires.php', views.grade3_questionaires, name='grade3_questionaires'),
    path('grade3_questionaires2.php', views.grade3_questionaires2, name='grade3_questionaires2'),
    path('summary_3.php', views.summary_3, name='summary_3'),
    path('analyze_similarity/', views.analyze_similarity, name='analyze_similarity'),
    path('grade4_pretest.php', views.grade4_pretest, name='grade4_pretest'),
    path('grade4_questionnaires.php', views.grade4_questionnaires, name='grade4_questionnaires'),
    path('grade4_questionnaires2.php', views.grade4_questionnaires2, name='grade4_questionnaires2'),
    path('grade4_questionnaires3.php', views.grade4_questionnaires3, name='grade4_questionnaires3'),
    path('summary_4.php', views.summary_4, name='summary_4'),
    path('grade2_posttest.php', views.grade2_posttest, name='grade2_posttest'),
    path('grade2_questionnaires.php', views.grade2_questionnaires, name='grade2_questionnaires'),
    path('grade2_questionnaires2.php', views.grade2_questionnaires2, name='grade2_questionnaires2'),
    path('summary_2.php', views.summary_2, name='summary_2'),


]


if settings.DEBUG:
    urlpatterns += static(settings.STATIC_URL, document_root=settings.STATIC_ROOT)