<?php

namespace App\AppBundle\Controller;

use App\AppBundle\Entity\Empresa;
use App\AppBundle\Form\EmpresaType;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EmpresaController extends FOSRestController
{
    /**
     * Retorna uma lista com todos as empresas cadastradas no sistema, ordenadas alfabeticamente.
     *
     * @return View
     *
     * @ApiDoc(
     *   section = "Empresas",
     *   resource = true,
     *   description = "Retorna a lista de empresas",
     *   output = "array<App\AppBundle\Form\EmpresaType>",
     *   statusCodes = {
     *     Response::HTTP_OK = "Retornado em caso de sucesso"
     *   }
     * )
     */
    public function getEmpresasAction()
    {
        $entities = $this->getDoctrine()->getRepository('AppBundle:Empresa')->findBy([], ['nome' => 'ASC']);
        return $this->view(['empresas' => $entities], Response::HTTP_OK);
    }

    /**
     * Retorna as informações detalhadas de uma empresa cadastrada no sistema.
     *
     * #### Markdown
     *
     * Pode ser utilizado [markdown](http://lmgtfy.com/?q=Markdown+Syntax&l=1) para escrever a documentação.
     *
     *
     * @param int $id ID da empresa para buscar.
     * @return View
     *
     * @ApiDoc(
     *   section = "Empresas",
     *   description = "Retorna os dados de uma empresa",
     *   output = "App\AppBundle\Form\EmpresaType",
     *   statusCodes = {
     *     Response::HTTP_OK = "Retornado em caso de sucesso",
     *     Response::HTTP_NOT_FOUND = "Se a empresa informada não existe"
     *   }
     * )
     */
    public function getEmpresaAction($id)
    {
        $entity = $this->getEntity($id);
        return $this->view(['empresa' => $entity], Response::HTTP_OK);
    }

    /**
     * Cria uma nova empresa.
     *
     * @param Request $request
     * @return View
     *
     * @ApiDoc(
     *   section = "Empresas",
     *   description = "Cria uma empresa",
     *   input = "App\AppBundle\Form\EmpresaType",
     *   statusCodes = {
     *     Response::HTTP_OK = "Retornado em caso de sucesso"
     *   }
     * )
     */
    public function postEmpresaAction(Request $request)
    {
        $entity = new Empresa();

        // Formulários podem ser usados para gerar o HTML dos forms, mas isso não é usado na API.
        // Aqui são usados apenas para a validação dos dados.
        $form = $this->createForm(new EmpresaType(), $entity);
        $form->bind($request->get('empresa'));

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->view(['empresa' => $entity], Response::HTTP_OK);
        }
    }

    /**
     * Cria ou edita uma empresa com o ID especificado.
     *
     * Mais detalhes seguem aqui sobre o funcionamento do método.
     *
     * @param Request $request
     * @param int $id Id of the entity
     * @return View
     *
     * @ApiDoc(
     *   section = "Empresas",
     *   description = "Edita uma empresa",
     *   input = "App\AppBundle\Form\EmpresaType",
     *   statusCodes = {
     *     Response::HTTP_OK = "Retornado em caso de sucesso",
     *     Response::HTTP_NOT_FOUND = "Se a empresa informada não existe"
     *   }
     * )
     */
    public function putEmpresaAction(Request $request, $id)
    {
        $entity = $this->getEntity($id);
        $form = $this->createForm(new EmpresaType(), $entity);
        $form->bind($request->get('empresa'));

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->view(['empresa' => $entity], Response::HTTP_OK);
        }
    }

    /**
     * Delete action
     *
     * @param int $id Id of the entity
     * @return View
     *
     * @ApiDoc(
     *   section = "Empresas",
     *   description = "Exclui uma empresa",
     *   statusCodes = {
     *     Response::HTTP_NO_CONTENT = "Retornado em caso de sucesso",
     *     Response::HTTP_NOT_FOUND = "Se a empresa informada não existe"
     *   }
     * )
     */
    public function deleteEmpresaAction($id)
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
     * @return Empresa
     */
    protected function getEntity($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:Empresa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Essa empresa não existe.');
        }

        return $entity;
    }
}
