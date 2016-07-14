--execute on git sh

* Generate annotations
vendor/bin/doctrine-module orm:convert-mapping --from-database --namespace="Application\\Entity\\" annotation module/Application/src/

* Generate entities with methods
vendor/bin/doctrine-module orm:generate-entities --generate-annotations="true" --generate-methods="true" module/Application/src/

* Generate repositories
--add on entity below @ORM\Entity
@ORM\Entity(repositoryClass="Application\Entity\NameRepository")
vendor/bin/doctrine-module orm:generate-repositories module/Application/src/