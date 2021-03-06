<?php

namespace Thelia\Model\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Thelia\Model\ProductSaleElementsProductDocument as ChildProductSaleElementsProductDocument;
use Thelia\Model\ProductSaleElementsProductDocumentQuery as ChildProductSaleElementsProductDocumentQuery;
use Thelia\Model\Map\ProductSaleElementsProductDocumentTableMap;

/**
 * Base class that represents a query for the 'product_sale_elements_product_document' table.
 *
 *
 *
 * @method     ChildProductSaleElementsProductDocumentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildProductSaleElementsProductDocumentQuery orderByProductSaleElementsId($order = Criteria::ASC) Order by the product_sale_elements_id column
 * @method     ChildProductSaleElementsProductDocumentQuery orderByProductDocumentId($order = Criteria::ASC) Order by the product_document_id column
 *
 * @method     ChildProductSaleElementsProductDocumentQuery groupById() Group by the id column
 * @method     ChildProductSaleElementsProductDocumentQuery groupByProductSaleElementsId() Group by the product_sale_elements_id column
 * @method     ChildProductSaleElementsProductDocumentQuery groupByProductDocumentId() Group by the product_document_id column
 *
 * @method     ChildProductSaleElementsProductDocumentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProductSaleElementsProductDocumentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProductSaleElementsProductDocumentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProductSaleElementsProductDocumentQuery leftJoinProductSaleElements($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductSaleElements relation
 * @method     ChildProductSaleElementsProductDocumentQuery rightJoinProductSaleElements($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductSaleElements relation
 * @method     ChildProductSaleElementsProductDocumentQuery innerJoinProductSaleElements($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductSaleElements relation
 *
 * @method     ChildProductSaleElementsProductDocumentQuery leftJoinProductDocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductDocument relation
 * @method     ChildProductSaleElementsProductDocumentQuery rightJoinProductDocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductDocument relation
 * @method     ChildProductSaleElementsProductDocumentQuery innerJoinProductDocument($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductDocument relation
 *
 * @method     ChildProductSaleElementsProductDocument findOne(ConnectionInterface $con = null) Return the first ChildProductSaleElementsProductDocument matching the query
 * @method     ChildProductSaleElementsProductDocument findOneOrCreate(ConnectionInterface $con = null) Return the first ChildProductSaleElementsProductDocument matching the query, or a new ChildProductSaleElementsProductDocument object populated from the query conditions when no match is found
 *
 * @method     ChildProductSaleElementsProductDocument findOneById(int $id) Return the first ChildProductSaleElementsProductDocument filtered by the id column
 * @method     ChildProductSaleElementsProductDocument findOneByProductSaleElementsId(int $product_sale_elements_id) Return the first ChildProductSaleElementsProductDocument filtered by the product_sale_elements_id column
 * @method     ChildProductSaleElementsProductDocument findOneByProductDocumentId(int $product_document_id) Return the first ChildProductSaleElementsProductDocument filtered by the product_document_id column
 *
 * @method     array findById(int $id) Return ChildProductSaleElementsProductDocument objects filtered by the id column
 * @method     array findByProductSaleElementsId(int $product_sale_elements_id) Return ChildProductSaleElementsProductDocument objects filtered by the product_sale_elements_id column
 * @method     array findByProductDocumentId(int $product_document_id) Return ChildProductSaleElementsProductDocument objects filtered by the product_document_id column
 *
 */
abstract class ProductSaleElementsProductDocumentQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Thelia\Model\Base\ProductSaleElementsProductDocumentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\Thelia\\Model\\ProductSaleElementsProductDocument', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildProductSaleElementsProductDocumentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildProductSaleElementsProductDocumentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \Thelia\Model\ProductSaleElementsProductDocumentQuery) {
            return $criteria;
        }
        $query = new \Thelia\Model\ProductSaleElementsProductDocumentQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildProductSaleElementsProductDocument|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductSaleElementsProductDocumentTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProductSaleElementsProductDocumentTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildProductSaleElementsProductDocument A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `PRODUCT_SALE_ELEMENTS_ID`, `PRODUCT_DOCUMENT_ID` FROM `product_sale_elements_product_document` WHERE `ID` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            $obj = new ChildProductSaleElementsProductDocument();
            $obj->hydrate($row);
            ProductSaleElementsProductDocumentTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildProductSaleElementsProductDocument|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ChildProductSaleElementsProductDocumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductSaleElementsProductDocumentTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildProductSaleElementsProductDocumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductSaleElementsProductDocumentTableMap::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductSaleElementsProductDocumentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ProductSaleElementsProductDocumentTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ProductSaleElementsProductDocumentTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductSaleElementsProductDocumentTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the product_sale_elements_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductSaleElementsId(1234); // WHERE product_sale_elements_id = 1234
     * $query->filterByProductSaleElementsId(array(12, 34)); // WHERE product_sale_elements_id IN (12, 34)
     * $query->filterByProductSaleElementsId(array('min' => 12)); // WHERE product_sale_elements_id > 12
     * </code>
     *
     * @see       filterByProductSaleElements()
     *
     * @param     mixed $productSaleElementsId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductSaleElementsProductDocumentQuery The current query, for fluid interface
     */
    public function filterByProductSaleElementsId($productSaleElementsId = null, $comparison = null)
    {
        if (is_array($productSaleElementsId)) {
            $useMinMax = false;
            if (isset($productSaleElementsId['min'])) {
                $this->addUsingAlias(ProductSaleElementsProductDocumentTableMap::PRODUCT_SALE_ELEMENTS_ID, $productSaleElementsId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productSaleElementsId['max'])) {
                $this->addUsingAlias(ProductSaleElementsProductDocumentTableMap::PRODUCT_SALE_ELEMENTS_ID, $productSaleElementsId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductSaleElementsProductDocumentTableMap::PRODUCT_SALE_ELEMENTS_ID, $productSaleElementsId, $comparison);
    }

    /**
     * Filter the query on the product_document_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductDocumentId(1234); // WHERE product_document_id = 1234
     * $query->filterByProductDocumentId(array(12, 34)); // WHERE product_document_id IN (12, 34)
     * $query->filterByProductDocumentId(array('min' => 12)); // WHERE product_document_id > 12
     * </code>
     *
     * @see       filterByProductDocument()
     *
     * @param     mixed $productDocumentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductSaleElementsProductDocumentQuery The current query, for fluid interface
     */
    public function filterByProductDocumentId($productDocumentId = null, $comparison = null)
    {
        if (is_array($productDocumentId)) {
            $useMinMax = false;
            if (isset($productDocumentId['min'])) {
                $this->addUsingAlias(ProductSaleElementsProductDocumentTableMap::PRODUCT_DOCUMENT_ID, $productDocumentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productDocumentId['max'])) {
                $this->addUsingAlias(ProductSaleElementsProductDocumentTableMap::PRODUCT_DOCUMENT_ID, $productDocumentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductSaleElementsProductDocumentTableMap::PRODUCT_DOCUMENT_ID, $productDocumentId, $comparison);
    }

    /**
     * Filter the query by a related \Thelia\Model\ProductSaleElements object
     *
     * @param \Thelia\Model\ProductSaleElements|ObjectCollection $productSaleElements The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductSaleElementsProductDocumentQuery The current query, for fluid interface
     */
    public function filterByProductSaleElements($productSaleElements, $comparison = null)
    {
        if ($productSaleElements instanceof \Thelia\Model\ProductSaleElements) {
            return $this
                ->addUsingAlias(ProductSaleElementsProductDocumentTableMap::PRODUCT_SALE_ELEMENTS_ID, $productSaleElements->getId(), $comparison);
        } elseif ($productSaleElements instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductSaleElementsProductDocumentTableMap::PRODUCT_SALE_ELEMENTS_ID, $productSaleElements->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByProductSaleElements() only accepts arguments of type \Thelia\Model\ProductSaleElements or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductSaleElements relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildProductSaleElementsProductDocumentQuery The current query, for fluid interface
     */
    public function joinProductSaleElements($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProductSaleElements');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ProductSaleElements');
        }

        return $this;
    }

    /**
     * Use the ProductSaleElements relation ProductSaleElements object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\ProductSaleElementsQuery A secondary query class using the current class as primary query
     */
    public function useProductSaleElementsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductSaleElements($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductSaleElements', '\Thelia\Model\ProductSaleElementsQuery');
    }

    /**
     * Filter the query by a related \Thelia\Model\ProductDocument object
     *
     * @param \Thelia\Model\ProductDocument|ObjectCollection $productDocument The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductSaleElementsProductDocumentQuery The current query, for fluid interface
     */
    public function filterByProductDocument($productDocument, $comparison = null)
    {
        if ($productDocument instanceof \Thelia\Model\ProductDocument) {
            return $this
                ->addUsingAlias(ProductSaleElementsProductDocumentTableMap::PRODUCT_DOCUMENT_ID, $productDocument->getId(), $comparison);
        } elseif ($productDocument instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProductSaleElementsProductDocumentTableMap::PRODUCT_DOCUMENT_ID, $productDocument->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByProductDocument() only accepts arguments of type \Thelia\Model\ProductDocument or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductDocument relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildProductSaleElementsProductDocumentQuery The current query, for fluid interface
     */
    public function joinProductDocument($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProductDocument');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ProductDocument');
        }

        return $this;
    }

    /**
     * Use the ProductDocument relation ProductDocument object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\ProductDocumentQuery A secondary query class using the current class as primary query
     */
    public function useProductDocumentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductDocument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductDocument', '\Thelia\Model\ProductDocumentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildProductSaleElementsProductDocument $productSaleElementsProductDocument Object to remove from the list of results
     *
     * @return ChildProductSaleElementsProductDocumentQuery The current query, for fluid interface
     */
    public function prune($productSaleElementsProductDocument = null)
    {
        if ($productSaleElementsProductDocument) {
            $this->addUsingAlias(ProductSaleElementsProductDocumentTableMap::ID, $productSaleElementsProductDocument->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the product_sale_elements_product_document table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductSaleElementsProductDocumentTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProductSaleElementsProductDocumentTableMap::clearInstancePool();
            ProductSaleElementsProductDocumentTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildProductSaleElementsProductDocument or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildProductSaleElementsProductDocument object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductSaleElementsProductDocumentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ProductSaleElementsProductDocumentTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        ProductSaleElementsProductDocumentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ProductSaleElementsProductDocumentTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // ProductSaleElementsProductDocumentQuery
