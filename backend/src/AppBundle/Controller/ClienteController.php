<?php

namespace App\AppBundle\Controller;

use App\AppBundle\Entity\Cliente;
use App\AppBundle\Form\ClienteType;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ClienteController extends FOSRestController
{
    /**
     * Retorna uma lista com todos os clientes cadastrados no sistema, ordenados alfabeticamente.
     *
     * @return View
     *
     * @ApiDoc(
     *   section = "Clientes",
     *   resource = true,
     *   description = "Retorna a lista de clientes",
     *   output = "array<App\AppBundle\Form\ClienteType>",
     *   statusCodes = {
     *     Response::HTTP_OK = "Retornado em caso de sucesso"
     *   }
     * )
     */
    public function getClientesAction()
    {
        $entities = $this->getDoctrine()->getRepository('AppBundle:Cliente')->findBy([], ['nome' => 'ASC']);
        return $this->view(['clientes' => $entities], Response::HTTP_OK);
    }

    /**
     * Retorna as informações detalhadas de um cliente cadastrado no sistema.
     *
     * #### Markdown
     *
     * Pode ser utilizado [markdown](http://lmgtfy.com/?q=Markdown+Syntax&l=1) para escrever a documentação.
     *
     *
     * @param int $id ID do cliente para buscar.
     * @return View
     *
     * @ApiDoc(
     *   section = "Clientes",
     *   description = "Retorna os dados de um cliente",
     *   output = "App\AppBundle\Form\ClienteType",
     *   statusCodes = {
     *     Response::HTTP_OK = "Retornado em caso de sucesso",
     *     Response::HTTP_NOT_FOUND = "Se o cliente informada não existe"
     *   }
     * )
     */
    public function getClienteAction($id)
    {
        $entity = $this->getEntity($id);
        return $this->view(['cliente' => $entity], Response::HTTP_OK);
    }

    /**
     * Cria um novo cliente.
     *
     * @param Request $request
     * @return View
     *
     * @ApiDoc(
     *   section = "Clientes",
     *   description = "Cria um cliente",
     *   input = "App\AppBundle\Form\ClienteType",
     *   statusCodes = {
     *     Response::HTTP_OK = "Retornado em caso de sucesso"
     *   }
     * )
     */
    public function postClienteAction(Request $request)
    {
        $entity = new Cliente();

        // Formulários podem ser usados para gerar o HTML dos forms, mas isso não é usado na API.
        // Aqui são usados apenas para a validação dos dados.
        $form = $this->createForm(new ClienteType(), $entity);
        $form->bind($request->get('cliente'));

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->view(['cliente' => $entity], Response::HTTP_OK);
        } else {
            return $this->view(['errors' => $form->getErrors()->getForm()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Cria ou edita um cliente com o ID especificado.
     *
     * Mais detalhes seguem aqui sobre o funcionamento do método.
     *
     * @param Request $request
     * @param int $id Id of the entity
     * @return View
     *
     * @ApiDoc(
     *   section = "Clientes",
     *   description = "Edita um cliente",
     *   input = "App\AppBundle\Form\ClienteType",
     *   statusCodes = {
     *     Response::HTTP_OK = "Retornado em caso de sucesso",
     *     Response::HTTP_NOT_FOUND = "Se o cliente informado não existe"
     *   }
     * )
     */
    public function putClienteAction(Request $request, $id)
    {
        $entity = $this->getEntity($id);
        $form = $this->createForm(new ClienteType(), $entity);
        $form->bind($request->get('cliente'));

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->view(['cliente' => $entity], Response::HTTP_OK);
        } else {
            return $this->view(['errors' => $form->getErrors()->getForm()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Delete action
    *
     * @param int $id Id of the entity
     * @return View
     *
     * @ApiDoc(
     *   section = "Clientes",
     *   description = "Exclui um cliente",
     *   statusCodes = {
     *     Response::HTTP_NO_CONTENT = "Retornado em caso de sucesso",
     *     Response::HTTP_NOT_FOUND = "Se o cliente informado não existe"
     *   }
     * )
     */
    public function deleteClienteAction($id)
    {
        $entity = $this->getEntity($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();
        return $this->view(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Get entity instance
     *
     * @param int $id Id of the entity
     * @return Cliente
     */
    protected function getEntity($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Esse cliente não existe.');
        }

        return $entity;
    }
}