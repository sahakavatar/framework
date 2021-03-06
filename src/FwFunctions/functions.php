<?php

function FWgetClasses()
{
    $modal = View::make('framework::FwFunctions.getClasses')->render();
    echo $modal;
    return '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Classes Modal</button>';
}

function FWget($data)
{
    $version = \Sahakavatar\Framework\Models\Framework::active()->first();
    $masterCollections = count($version) ? $version->getMasterCollectionsByType($data['tag']) : [];
    $collections = ($version) ? $version->getCollectionsByType($data['tag']) : [];
    $name = (isset($data['name']) ? $data["name"] : null);
    $tag = (isset($data['tag']) ? htmlentities("<" . $data["tag"] . ">") : null);
    $modal = View::make('framework::FwFunctions.getCollections', compact('masterCollections', 'collections', 'tag', 'name'))->render();

    return $modal;
}

function BBCss($section = 'frontend')
{
    $adminsettingRepository = new  \Sahakavatar\Settings\Repository\AdminsettingRepository();
    $model = $adminsettingRepository->getVersionsSettings('versions', $section);
    if (count($model)) {
        if (isset($model['css_version']) && count($model['css_version'])) {
            foreach ($model['css_version'] as $id){
                $versionRepo = new \Sahakavatar\Framework\Repository\VersionsRepository();
                $version = $versionRepo->find($id);
                $path = ($version->env =='local') ? "/css/versions/" . $version->file_name : $version->file_name;
                return Html::style($path);
            }
        }

    }
    return '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">';
}

function BBJs($section = 'frontend')
{
    $adminsettingRepository = new  \Sahakavatar\Settings\Repository\AdminsettingRepository();
    $model = $adminsettingRepository->getVersionsSettings('versions', $section);
    if (count($model)) {
        if (isset($model['js_data']) && count($model['js_data'])) {
            foreach ($model['js_data'] as $id){
                $versionRepo = new \Sahakavatar\Framework\Repository\VersionsRepository();
                $version = $versionRepo->find($id);
                return Html::style($version->file_name);
            }
        }
    }
}

function BBJquery($section = 'frontend')
{
    $adminsettingRepository = new  \Sahakavatar\Settings\Repository\AdminsettingRepository();
    $model = $adminsettingRepository->getVersionsSettings('versions', $section);
    if (count($model)) {
//        if ($model['jquery_option']) {
//            return Html::script($model['jquery_version']);
//        } else {
//            return Html::script($model['jquery_url']);
//        }

    }

    return '<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>';
}

function BBMainJS()
{
    if (\File::exists(public_path('js/back.js'))) {
        return Html::script('/js/back.js');
    }
    return '<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>';
}

function BBMainFrontJS()
{
    if (\File::exists(public_path('js/front.js'))) {
        return Html::script('/js/front.js');
    }
    return '<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>';
}