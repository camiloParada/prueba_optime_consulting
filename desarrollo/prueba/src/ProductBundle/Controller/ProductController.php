<?php

namespace ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ProductBundle\Entity\Product;
use ProductBundle\Form\ProductType;

class ProductController extends Controller
{
    public function indexAction(Request $request)
    {

		$em = $this->getDoctrine()->getManager();
		$product = new Product();
    	$form = $this->createCreateForm($product);
	
    	$pagination = $this->paginationGenerate($request, 5);

        return $this->render('@Product/Products/index.html.twig', array('pagination' => $pagination, 'form' => $form->createView())); 
    }

    private function paginationGenerate(Request $request, $pages){

    	$em = $this->getDoctrine()->getManager();
        $dql = "SELECT p FROM ProductBundle:Product p ORDER BY p.id DESC";
        $products = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        	$products, $request->query->getInt('page', 1),
        	$pages
        );

        return $pagination;
    }

    private function createCreateForm(Product $entity){
    	
    	$form = $this->createForm(ProductType::class, $entity, array(
    		'action' => $this->generateUrl('product_create'),
    		'method' => 'POST',
    	));	

    	return $form;
    }

    public function createAction(Request $request){

    	$product = new Product();
    	$form = $this->createCreateForm($product);
    	$form->handleRequest($request);

    	if ($form->isValid()) {
    		
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($product);
    		$em->flush();

    		$successMessage = $this->get('translator')->trans('The product has been created.');
    		$this->addFlash('customMessage', $successMessage);

    		return $this->redirectToRoute('product_index');
    	}

    	$pagination = $this->paginationGenerate($request, 5);

        return $this->render('@Product/Products/index.html.twig', array('pagination' => $pagination, 'form' => $form->createView()));  
    }

    public function editAction($id){

    	$em = $this->getDoctrine()->getManager();
    	$product = $em->getRepository('ProductBundle:Product')->find($id);

    	if (!$product) {
    		$exceptionMessage = $this->get('translator')->trans('Product not found.');
    		throw $this->createNotFoundException($exceptionMessage);
    	}

    	$form = $this->createEditForm($product);

    	return $this->render('@Product/Products/edit.html.twig', array('product' => $product, 'form' => $form->createView())); 
    }

    private function createEditForm(Product $entity){

    	$form = $this->createForm(ProductType::class, $entity, array(
    		'action' => $this->generateUrl('product_update', 
    		array('id' => $entity->getId() )), 
    		'method' => 'PUT' 	 		
    	));	

    	return $form;
    }

    public function updateAction($id, Request $request){

    	$em = $this->getDoctrine()->getManager();
    	$product = $em->getRepository('ProductBundle:Product')->find($id);

    	if (!$product) {
    		$exceptionMessage = $this->get('translator')->trans('Product not found.');
    		throw $this->createNotFoundException($exceptionMessage);
    	}

    	$form = $this->createEditForm($product);
    	$form->handleRequest($request);

    	if ($form->isSubmitted() && $form->isValid()) {

    		$em->flush();

    		$successMessage = $this->get('translator')->trans('The product has been modified.');
    		$this->addFlash('customMessage', $successMessage);

    		return $this->redirectToRoute('product_edit', array('id' => $product->getId()));
    	}

        return $this->render('@Product/Products/edit.html.twig', array('product' => $product, 'form' => $form->createView())); 
    }

    private function createDeleteForm($product){

    	return $this->createFormBuilder()
    		->setAction($this->generateUrl('product_delete', array('id' => $product->getId())))
    		->setMethod('DELETE')
    		->getForm();

    }

    public function deleteAction($id){

    	$em = $this->getDoctrine()->getManager();
    	$product = $em->getRepository('ProductBundle:Product')->find($id);

    	if (!$product) {
    		$exceptionMessage = $this->get('translator')->trans('Product not found.');
    		throw $this->createNotFoundException($exceptionMessage);
    	}

    	$form = $this->createDeleteForm($product);

		$em->remove($product);
		$em->flush();

		$successMessage = $this->get('translator')->trans('The product has been deleted.');
		$this->addFlash('customMessage', $successMessage);

		return $this->redirectToRoute('product_index');
		
    }
}
