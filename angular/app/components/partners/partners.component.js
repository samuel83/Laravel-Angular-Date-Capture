class PartnersController{
    constructor($scope, $state, $compile, DTOptionsBuilder, DTColumnBuilder, API) {
        'ngInject'

        this.API = API
        this.$state = $state
        let Partners = this.API.service('partners')
        Partners.getList()
            .then((response) => {
                let dataSet = response.plain()

                this.dtOptions = DTOptionsBuilder.newOptions()
                    .withOption('data', dataSet)
                    .withOption('createdRow', createdRow)
                    .withOption('responsive', true)
                    .withBootstrap()

                this.dtColumns = [
                    DTColumnBuilder.newColumn('id').withTitle('ID'),
                    DTColumnBuilder.newColumn('partner_name').withTitle('Partner Name'),
                    DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
                        .renderWith(actionsHtml)
                ]

                this.displayTable = true
            })
        let
            createdRow = (row) => {
                $compile(angular.element(row).contents())($scope)
            }

        let
            actionsHtml = (data) => {
                return `
                    <a class="btn btn-xs btn-warning" ui-sref="app.partnersedit({partnerId: ${data.id}})">
                        <i class="fa fa-edit"></i>
                    </a>
                    &nbsp
                    <button class="btn btn-xs btn-danger" ng-click="vm.delete(${data.id})">
                        <i class="fa fa-trash-o" style="width:12.02px"></i>
                    </button>`
            }
    }
    delete(partnerId) {
        let API = this.API
        let $state = this.$state

        swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this data!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            html: false
        }, function () {
            API.one('partners').one('partner', partnerId).remove()
                .then(() => {
                    swal({
                        title: 'Deleted!',
                        text: 'Partner has been deleted.',
                        type: 'success',
                        confirmButtonText: 'OK',
                        closeOnConfirm: true
                    }, function () {
                        $state.reload()
                    })
                })
        })
    }
    $onInit(){
    }
}

export const PartnersComponent = {
    templateUrl: './views/app/components/partners/partners.component.html',
    controller: PartnersController,
    controllerAs: 'vm',
    bindings: {}
}
