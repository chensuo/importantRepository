/**
 * Created by Administrator on 2018/1/15.
 */
(function(){
    /************appģ��=>�Զ������********************/
    angular.module('app.service' , [])
        .constant('ROOT_URL' , 'http://101.200.58.3/librarywebapi/')

        /*��Ŀ��Ϣ����*/
        .service('sortService' , function($http , ROOT_URL){
            //��ȡ��ҳ��Ŀ��Ϣ
            this.getSortData = function(){
                return $http.get(ROOT_URL + 'section/list');
            };
            //�������Ŀ
            this.addNewSortData = function(name , priority){
                return $http({
                    method:'post',
                    url:ROOT_URL + 'section/create',
                    params: {name: name , priority:priority}
                });
            };
            //ɾ������Ŀ
            this.removeThisSortData = function(id){
                return $http({
                    method:'post',
                    url:ROOT_URL + 'section/delete',
                    params:{id:id}
                });
            }
        })
        /*sessionStroage ��ȡ��Ϣ*/
        .service('sessionService' , function($http , $window){
            //sessionStorage������
            this.sessionSetData = function(key , value){
                return $window.sessionStorage.setItem(key  , JSON.stringify(value));
            };
            //sessionStorageȡ����
            this.sessionGetData = function(key){
                return JSON.parse($window.sessionStorage.getItem(key));
            };
            //sessionStorage�������
            this.sessionRemoveData = function(key){
                return $window.sessionStorage.removeItem(key);
            }
        })
        /*changeSort*/
        .service('changeSortService' ,function($http , ROOT_URL){
            //�����޸�
            this.saveSortChangeData = function(id , name , priority ){
                return $http({
                    method: 'post',
                    url: ROOT_URL + 'section/update',
                    params: {id: id, name: name, priority: priority}
                });

            };
            //��ȡ����Ŀ����
            this.getThisSortDetailData = function(id){
                return $http.get(ROOT_URL + 'section/single?id=' + id);
            };
        })
        /*sortDetail*/
        .service('sortDetailService' ,function($http , ROOT_URL){
            //��ȡ����Ŀ����
            this.getThisSortDetailData = function(id){
                return $http.get(ROOT_URL + 'section/single?id=' + id);
            };
        })
        /*bookCategory*/
        .service('bookCategoryService' , function($http , ROOT_URL){
            //��ȡͼ�����
            this.getBookCatagoryData = function(){
                return $http.get(ROOT_URL + 'category/list');
            };
            //����·���
            this.addNewBookCategoryData = function(form) {
                return $http({
                    method: 'post',
                    url: ROOT_URL + 'category/create',
                    data: form,
                    headers: {'Content-Type': undefined},
                    transformRequest: function(data){
                        var formData = new FormData();
                        for(var key in data){
                            formData.append(key , data[key]);
                        }
                        return formData;
                    }
                });
            };
            //��ȡ������Ϣ
            this.getThisBookCategoryData = function(id){
                return $http.get(ROOT_URL + 'category/single?id=' + id);
            };
            //�޸ĸ�������
            this.startChangeThisCategory = function(form){
                return $http({
                    method: 'post',
                    url: ROOT_URL + 'category/update',
                    data: form,
                    headers: {'Content-Type': undefined},
                    transformRequest: function(data){
                        var formData = new FormData();
                        for(var key in data){
                            formData.append(key , data[key]);
                        }
                        return formData;
                    }
                });
            }
        })
        /*ͼ����Ϣ����*/
        .service('bookDataService' , function($http , ROOT_URL){
            //ͼ����Ϣ��ѯ
            this.getBookData = function(form){
                return $http.get(ROOT_URL + 'book/list' , {params:{categoryId:form.categoryId , publisherId:form.publisherId , keyword:form.keyword}});
            };
            //��ȡ�����б� ��������Ϣ
            this.getSelectPublisherData = function(){
                return $http.get(ROOT_URL + 'publisher/list');
            };

            //�ض�ͼ���ѯ
            this.getThisBookData = function(id){
                return $http.get(ROOT_URL + 'book/single?id=' + id);
            };

            //������Ŀ��ѯͼ����Ϣ
            this.getBookDataBySort = function(sectionId){
                return $http.get(ROOT_URL + 'book/GetBooksBySection?sectionId=' + sectionId) ;
            };

            //���ͼ�������Ϣ
            this.addBookData = function(form){
                return $http({
                    method:'post',
                    url:ROOT_URL + 'book/create',
                    data: form,
                    headers: {'Content-Type': undefined},
                    transformRequest: function(data){
                        var formData = new FormData();
                        for(var key in data){
                            formData.append(key , data[key]);
                        }
                        return formData;
                    }

                });
            };

            //����ͼ�������Ϣ
            this.changeBookData = function(form){
                return $http({
                    method:'post',
                    url:ROOT_URL + 'book/update',
                    data: form,
                    headers: {'Content-Type': undefined},
                    transformRequest: function(data){
                        var formData = new FormData();
                        for(var key in data){
                            formData.append(key , data[key]);
                        }
                        return formData;
                    }

                });
            };

            //�����ͼ��
            this.addNewBookData = function(form){
                return $http({
                    method:'post',
                    url:ROOT_URL + 'book/create',
                    data: form,
                    headers: {'Content-Type': undefined},
                    transformRequest: function(data){
                        var formData = new FormData();
                        for(var key in data){
                            formData.append(key , data[key]);
                        }
                        return formData;
                    }

                });
            };

            //ͼ�����
            this.bookPortData = function(form){
                return $http({
                    method:'post',
                    url:ROOT_URL + 'book/putaway',
                    params: {bookId:form.bookId , count:form.count , libraryId:form.libraryId}
                });
            }

        })
        /*bookDataDetail(ͼ����Ϣ���� => ����ҳ��)*/
        .service('bookDataDetailService' , function($http , ROOT_URL){
            //��ȡ��ͼ������
            this.getThisBookDataDetail = function(id){
                return $http.get(ROOT_URL + 'book/single?id=' + id);
            };
            //��ȡ��������
            this.getAllAuthor = function(){
                return $http.get(ROOT_URL + 'author/list');
            };
            //��ȡ���г�����
            this.getAllPublisher = function(){
                return $http.get(ROOT_URL + 'publisher/list');
            };

        })
        /*������Ϣ����*/
        .service('orderManageService' , function($http , ROOT_URL){
            //��ȡ���ж���
            this.getAllOrderData = function(){
                return $http.get(ROOT_URL + 'Transaction/GetAllBorrowRecords');
            };

            //����
            this.sendBookData = function(orderId){
                return $http.get(ROOT_URL + 'Transaction/Distribution?orderId=' + orderId);
            };

            //�黹
            this.backBookData = function(orderId , bookNumber){
                return $http.get(ROOT_URL + 'Transaction/ReturnBook' , {params:{orderId:orderId , bookNumber:bookNumber}});
            }
        });

})();